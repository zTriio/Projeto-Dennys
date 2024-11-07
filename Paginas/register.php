<?php
require 'Classes/Database.php';
require 'Classes/Usuario.php';

$db = (new Database())->getConnection();
$usuario = new Usuario($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $usuario->registrar($_POST['username'], $_POST['password']);
        echo "Usuário registrado com sucesso!";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre Sua Conta</title>
    <link rel="stylesheet" href="estiloregister.css">
</head>
<body>
    <div class="register-container">
        <h2>Registre-se</h2>
        <form action="register.php" method="POST"> 
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Cadastrar</button>
            <p>Tem Conta? <a href="login.php">Faça Login</a></p>
        </form>
    </div>
</body>
</html>