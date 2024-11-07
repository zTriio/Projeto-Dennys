<?php
require 'Classes/Database.php';
require 'Classes/Usuario.php';

$db = (new Database())->getConnection();
$usuario = new Usuario($db);

$usuario->logout();

header("Location: login.php");
exit;
?>
