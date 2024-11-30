<?php
require 'DataBase.php';
require 'Usuario.php';

$db = (new Database())->getConnection();
$usuario = new Usuario($db);

$usuario->logout();

header("Location: login.php");
exit;
?>
