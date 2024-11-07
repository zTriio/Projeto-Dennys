<?php

class Usuario {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar($usuario, $senha) {
        if (strlen($senha) < 6) {
            throw new Exception("A senha deve ter pelo menos 6 caracteres.");
        }

        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $usuario, $senhaCriptografada);
        
        return $stmt->execute();
    }

    public function login($usuario, $senha) {
        $sql = "SELECT senha FROM usuarios WHERE usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($senhaCriptografada);
            $stmt->fetch();

            if (password_verify($senha, $senhaCriptografada)) {
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
