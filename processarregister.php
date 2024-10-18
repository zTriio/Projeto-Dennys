<?php 
session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $servername = "";
        $bancousuario = "";
        $bancosenha = "";
        $nomebanco = "";

        $conn = new mysqli($servername, $usuario, $bancosenha, $nomebanco);

        if($conn->connect_error){
            die("falha na conexao" .  $conn->connect_error);
        }

        $usuario = $_POST['username'];
        $senha = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $gmail = $_POST['email'];

        // $sql = comando sql pra verificar (adicionar quando criar o banco de dados)
        if($conn->query($sql) === true){
            console.log('Registro completo');
            header('location: login.php');
            exit;

        }else{
            console.log('Nao foi Possivel registrar-se, pois esse usuario ja existi');
            header('location: register.php');
            exit;
        }
        $conn->close();
    }    
?>        