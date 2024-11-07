<?php
require 'classes/Database.php';
require 'classes/Usuario.php';

$db = (new Database())->getConnection();
$usuario = new Usuario($db);

$usuario->logout();

header("Location: login.php");
exit;
?>
