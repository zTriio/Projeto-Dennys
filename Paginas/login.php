<?php
require 'classes/Database.php';
require 'classes/Usuario.php';

$db = (new Database())->getConnection();
$usuario = new Usuario($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($usuario->login($_POST['username'], $_POST['password'])) {
        header('Location: index.php');
    } else {
        echo "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilologin.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
            <p>Ainda não tem conta? <a href="register.php">Cadastre-se</a></p>
        </form>
    </div>
</body>
</html>