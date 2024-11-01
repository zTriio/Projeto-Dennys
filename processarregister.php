<?php 
session_start();

  $servername = "aa";
  $bancousuario = "aa";
  $bancosenha = "aa";
  $nomebanco = "aa";


    if($conn->connect_error){
        die("falha na conexao" .  $conn->connect_error);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        $conn = new mysqli($servername, $usuario, $bancosenha, $nomebanco);

        $usuario = $username;
        $senha = password_hash($password, PASSWORD_DEFAULT);
        $gmail = $email;

        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            echo "Nome de usuário inválido. Apenas letras e números são permitidos.";
            exit;
        }
        if (strlen($password) < 6) {
                echo "A senha deve ter pelo menos 6 caracteres.";
            exit;
        }

        //adicionar verificaçao de input do email
        // $sql = comando sql pra verificar (adicionar quando criar o banco de dados)
        
        if($conn->query($sql) === true){
            console.log('Registro completo');
            header('location: login.php');
            exit;

        }else{
            console.log('Nao foi Possivel registrar-se, Tente Novamente');
            header('location: register.php');
            exit;
        }
        $conn->close();
    }
   
?>        