<?php
$host = "localhost:33065";
$user = "root";
$pass = "";
$db = "losgemelos";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>