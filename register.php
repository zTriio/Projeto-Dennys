<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre Sua Conta</title>
    <link rel="stylesheet" href="estiloregister.css">
</head>
<body>
    <div class="register-container">
        <h2>Registre-se</h2>
        <form action="processarregister.php" method="post"> 
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