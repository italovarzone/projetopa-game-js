<?php

include '../orders/backend/conexao.php';

$connect = new mysqli("localhost", "root", "", "bdmemoria");

if ($connect -> connect_errno) {
    echo "Failed to connect to MySQL: " . $connect -> connect_error;
    exit();
}

session_start();

$body = file_get_contents('php://input');
$json = json_decode($body, true);

$id_usuario = $json['id'];
$time_record = $json['time_record'];

var_dump($_POST);

// Executar a query SQL
$sql = "UPDATE usuarios SET time_record = '$time_record' WHERE id = '$id_usuario'";

if (mysqli_query($connect, $sql)) {
  if ($sql) {
    echo "true";
  } else {
    echo "false";
  }
} else {
  echo "Erro ao consultar na base: " . mysqli_error($connect);
}

mysqli_close($connect);
?>