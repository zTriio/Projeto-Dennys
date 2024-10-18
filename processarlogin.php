<?php 
session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
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

       // $sql = comando sql pra verificar (adicionar quando criar o banco de dados)
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$usuario, $senha);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $usuario;

            header('location: index.php');
            exit;
        }else{
            header('location: login.php');
            console.log('login ou senha incorreta');
        }
        $conn->close();
        $stmt->close();
        }
?>
