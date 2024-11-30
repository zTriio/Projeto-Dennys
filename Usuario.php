<?php

class Usuario {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar($usuario, $senha, $email) {
        if (strlen($senha) < 6) {
            throw new Exception("A senha deve ter pelo menos 6 caracteres.");
        }

        $criptografada = hash('sha256',$senha);

        $sql = "INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $usuario, $criptografada, $email);
        
        return $stmt->execute();
    }

    public function login($usuario, $senha) {
        $sql = "SELECT senha FROM usuarios WHERE usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();
        $senhahash = null;
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($senhahash);
            $stmt->fetch();

            if (hash('sha256',$senha) === $senhahash) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['usuario'] = $usuario;
                return true;
            }
        }
        return false;
    }

    public function logout() {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
    }
}
?>
