<?php session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
        header('location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopets</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="">Início</a></li>
                <li><a href="">Sobre</a></li>
                <li><a href="">Pets</a></li>
                <li><a href="">Contato</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>