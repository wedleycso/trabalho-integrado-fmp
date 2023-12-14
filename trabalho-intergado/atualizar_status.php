<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Serviços</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="">
</head>
<body>
  <div class="form-group mt-3 col-sm-12 col-md-2">
    <button type="button" classe="btn btn-primary">
      <a class="btn btn-primary" href="listar_servicos.php" role="button">Voltar</a>
    </button>
  </div>
</body>

</html>

<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$idServico = $_POST['id_servico'];
	$novoStatus = $_POST['novoStatus'];

	// Atualize o status no banco de dados.
	$sqlUpdate = "UPDATE servicos SET status = '$novoStatus' WHERE id_servico = $idServico";

	if ($conn->query($sqlUpdate) === TRUE) {
		// Redireciona de volta para a página principal
		header("Location: listar_servicos.php");
		exit();
	} else {
		echo "Erro ao alterar o status: " . $conn->error;
	}
}

$conn->close();
?>