<?php

include '../orders/backend/conexao.php';

$connect = new mysqli("localhost", "root", "", "bdmemoria");

if ($connect -> connect_errno) {
    echo "Failed to connect to MySQL: " . $connect -> connect_error;
    exit();
}

session_start();

$user = $_SESSION['usuario_id'];

$body = file_get_contents('php://input');
$json = json_decode($body, true);

$id_usuario = $json['id'];

$sql = "SELECT * FROM usuarios WHERE id = '$id_usuario'";

if ($sql) {
    echo "true";
} else {
    echo "false";
}


?>