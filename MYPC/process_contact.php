<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['reason'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $reason = $_POST['reason'];

        $servername = "localhost";
        $username = "seu_usuario";
        $password = "sua_senha";
        $dbname = "seu_banco_de_dados";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO mensagens_contato (nome, email, motivo) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $reason);

        if ($stmt->execute()) {
            echo "Mensagem enviada com sucesso!";
        } else {
            echo "Erro ao enviar mensagem: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Requisição inválida.";
}
?>
