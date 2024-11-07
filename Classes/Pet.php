<?php

class Pet {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function adicionarPet($nome, $idade, $tipo, $imagem) {
        $sql = "INSERT INTO pets (nome, idade, tipo, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siss", $nome, $idade, $tipo, $imagem);

        return $stmt->execute();
    }

    public function listarPets() {
        $sql = "SELECT * FROM pets";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
