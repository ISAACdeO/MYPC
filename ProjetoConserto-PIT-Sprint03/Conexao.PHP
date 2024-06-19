<?php
$servername = "localhost"; // Endereço do servidor MySQL (geralmente 'localhost' para desenvolvimento local)
$username = "root"; // Nome de usuário do MySQL
$password = "root"; // Senha do MySQL
$dbname = "MYPC_PIT"; // Nome do banco de dados que você quer se conectar

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
