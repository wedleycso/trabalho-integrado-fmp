<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
		// Verifica se a chave 'id' está definida na URL
		if (isset($_GET['id_cliente'])) {
				// Obtém e escapa o valor do 'id_cliente'
				$id_cliente = mysqli_real_escape_string($conn, $_GET['id_cliente']);

				// Use prepared statements para evitar SQL injection
				$sql = "DELETE FROM cliente WHERE id_cliente=?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("i", $id_cliente);

				if ($stmt->execute()) {
						header("Location: listar_cliente.php");
				} else {
						echo "Erro ao excluir cliente: " . $stmt->error;
				}
		} else {
				echo "ID do cliente não fornecido.";
		}
}

$conn->close();
