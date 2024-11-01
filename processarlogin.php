<?php 
session_start();

$servername = "";
$bancousuario = "";
$bancosenha = "";
$nomebanco = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        $conn = new mysqli($servername, $usuario, $bancosenha, $nomebanco);

        if($conn->connect_error){
            die("falha na conexao" .  $conn->connect_error);
        }

        $usuario = $username;
        $senha = $password;

        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            echo "Nome de usuário inválido. Apenas letras e números são permitidos.";
            exit;
        }

       // $sql = comando sql pra verificar (adicionar quando criar o banco de dados) verificar usuario
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$usuario);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($senhahash);
            $stmt->fetch();

            if (password_verify($senha, $senhaHash)) {

                $_SESSION['loggedin'] = true;
                $_SESSION['usuario'] = $usuario;
                header('Location: index.php');
                exit;
            }else{
                header('location: login.php');
                console.log('login ou senha incorreta');
            }
         $conn->close();
         $stmt->close();
        }else{
            echo "Nome de usuário não encontrado.";
        }
    }
?>
