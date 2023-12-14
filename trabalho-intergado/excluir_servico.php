<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
		// Verifica se a chave 'id_servico' está definida na URL
		if (isset($_GET['id_servico'])) {
				// Obtém e escapa o valor do 'id_servico'
				$id_servico = mysqli_real_escape_string($conn, $_GET['id_servico']);

				// Use prepared statements para evitar SQL injection
				$sql = "DELETE FROM servicos WHERE id_servico=?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("i", $id_servico);

				if ($stmt->execute()) {
						header("Location: listar_servicos.php");
				} else {
						echo "Erro ao excluir serviço: " . $stmt->error;
				}
		} else {
				echo "ID do serviço não fornecido.";
		}
}

$conn->close();
