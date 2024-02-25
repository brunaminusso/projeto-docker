<?php
    $servername = "db";
    $username = "root";
    $password = "";
    $dbname = getenv('MYSQL_DATABASE');

    $conn = new mysqli($servername, $username, $password, $dbname);

    $routes = [
        'home' => function() {
            echo "<p>Página inicial</p>";
        },
        
        'insert-data' => function() {
            global $conn;

            $username = $_POST['username'];
            $email = $_POST['email'];

            $sql = "INSERT INTO users (username, email) VALUES (?, ?)";

            $stmt = mysqli_prepare($conn, $sql);

            if (!$stmt) {
                echo "<p style='color:red;'>Erro ao preparar a consulta: " . mysqli_error($conn) . "</p>";
                return;
            }

            mysqli_stmt_bind_param($stmt, "ss", $username, $email);

            $result = mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);

            if ($result) {
                echo "<p style='color:green;'>Dados inseridos com sucesso!</p>";
            } else {
                echo "<p style='color:red;'>Erro ao inserir dados: " . mysqli_error($conn) . "</p>";
            }
        },
    ];

    if (isset($_GET['route'])) {
        $route = $_GET['route'];
    } else {
        $route = 'home';
    }

    if (array_key_exists($route, $routes)) {
        call_user_func($routes[$route]);
    } else {
        echo "Rota não encontrada";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserir Dados no Banco de Dados</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f0f0f0;
            }
            h1 {
                text-align: center;
                padding: 20px 0;
                color: #ff4411; 
                font-size: 48px; 
                font-family: 'Signika', sans-serif; 
                padding-bottom: 10px;
            }
            form {
                width: 300px;
                margin: 0 auto;
                box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
                padding: 20px;
                background-color: white;
                border-radius: 5px;
            }
            label {
                display: block;
                margin: 10px 0;
            }
            input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
                transition: border 0.3s;
            }
            input:focus {
                border: 1px solid #007BFF;
            }
            button {
                display: block;
                width: 100%;
                padding: 10px;
                background-color: #007BFF;
                color: white;
                border: none;
                border-radius: 5px;
                margin-top: 20px;
                transition: background-color 0.3s;
            }
            button:hover {
                background-color: #0056b3;
            }
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        </style>
    </head>
    <body>
        <h1>Conteinerização</h1>
        <form action="index.php?route=insert-data" method="post">
            <label for="username">Nome:</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <br>
            <br>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>
