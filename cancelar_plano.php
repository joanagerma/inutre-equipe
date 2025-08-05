<?php
session_start();
require 'cnx.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$sql = "UPDATE cadastro_usuarios SET plano = 'basico', premium_expires = NULL WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $_SESSION['id']]);

header("Location: planos.php?cancelado=true");
exit();
?>
