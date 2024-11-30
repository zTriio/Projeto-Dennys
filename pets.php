<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

require 'DataBase.php';
require 'Pet.php';

$db = (new Database())->getConnection();
$pet = new Pet($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomePet = $_POST['nomePet'];
    $idadePet = $_POST['idadePet'];
    $tipoPet = $_POST['tipoPet'];
    $imagemPet = $_FILES['imagemPet']['name'];
    $caminhoImagem = 'uploads/' . $imagemPet;

    if (move_uploaded_file($_FILES['imagemPet']['tmp_name'], $caminhoImagem)) {
        $pet->adicionarPet($nomePet, $idadePet, $tipoPet, $caminhoImagem);
    }
}

$pets = $pet->listarPets();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Pets</title>
    <link rel="stylesheet" href="estilopets.css">
</head>
<body>
    <form action="pets.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="nomePet" placeholder="Nome do Pet" required>
        <input type="number" name="idadePet" placeholder="Idade do Pet" required>
        <input type="text" name="tipoPet" placeholder="Tipo do Pet" required>
        <input type="file" name="imagemPet" required>
        <button type="submit">Adicionar Pet</button>
    </form>
    
    <h2>Lista de Pets</h2>
    <ul>
        <?php foreach ($pets as $p): ?>
            <li><?php echo $p['nome']; ?> - <?php echo $p['idade']; ?> anos - <img src="<?php echo $p['imagem']; ?>" width="50"></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
