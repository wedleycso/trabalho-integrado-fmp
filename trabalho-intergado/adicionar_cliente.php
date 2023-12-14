<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="">
</head>

<body>
  <div class="jumbotron">
    <h1>Adicionar Cliente</h1>
    <p class="lead">Sugestão do que fazer na pág.</p>
  </div>

  <div class="card mb-3 p-3 rounded-sm">
    <form class="row" action="adicionar_cliente.php" method="POST">
      <div class="form-group col-sm-6 col-md-4">
        <label for="titulo">Nome:</label><br>
        <input type="text" placeholder="Digite o nome do cliente" id="titulo" name="titulo" required><br>
      </div>
      <div class="form-group col-sm-6 col-md-4">
        <label for="endereco">Endereço:</label><br>
        <input type="text" placeholder="Digite o endereço" id="endereco" name="endereco" required><br>
      </div>
      <div class="form-group col-sm-6 col-md-4">
        <label for="telefone">Telefone:</label><br>
        <input type="text" placeholder="Digite o telefone" id="telefone" name="telefone" required><br><br>
      </div>
      <div class="form-group mt-3 col-sm-12 col-md-2">
        <button type="button" classe="btn btn-primary ">
          <input class="btn btn-primary" type="submit" value="Adicionar">
        </button>

        <button type="button" classe="btn btn-primary">
          <a class="btn btn-primary" href="index.php" role="button">Voltar</a>
        </button>
      </div>
    </form>
  </div>
    <?php
    include 'conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = mysqli_real_escape_string($conn, $_POST['titulo']);
        $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
        $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);

        $sql = "INSERT INTO cliente (nome, endereco, telefone) VALUES ('$nome', '$endereco', '$telefone')";
        if ($conn->query($sql) === TRUE) {
            echo "Cliente adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar cliente: " . $conn->error;
        }
    }

    $conn->close();
    ?>

</body>

</html>