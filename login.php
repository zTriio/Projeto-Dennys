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
        <form action="processarlogin.php" method="post">
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