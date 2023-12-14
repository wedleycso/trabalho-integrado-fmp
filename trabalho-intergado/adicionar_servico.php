<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Serviço</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="">
</head>

<body>
  <div class="jumbotron">
    <h1 class="display-4">Adicionar Serviço</h1>
    <p class="lead">Sugestão do que fazer na pág.</p>
  </div>

    <div class="card mb-3 p-3 rounded-sm">
        <form class="row" action="adicionar_servico.php" method="POST">
          <div class="form-group col-sm-6 col-md-4">
            <label for="titulo">Título:</label><br>
            <input type="text" class="form-control" placeholder="Digite um título para o serviço" id="titulo" name="titulo" required><br>
          </div>

          <div class="form-group col-sm-6 col-md-4">
            <label for="descricao">Descrição:</label><br>
            <textarea class="form-control" placeholder="Digite uma descrição para o serviço" id="descricao" name="descricao"></textarea><br>
          </div>

          <div class="form-group col-sm-6 col-md-4">
            <label for="data">Data de Agendamento:</label><br>
            <input type="date" class="form-control" id="data" name="data" required><br><br>
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
        $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
        $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
        $data = mysqli_real_escape_string($conn, $_POST['data']);

        $sql = "INSERT INTO servicos (titulo, descricao, data_agendamento) VALUES ('$titulo', '$descricao', '$data')";
        if ($conn->query($sql) === TRUE) {
            echo "Serviço adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar serviço: " . $conn->error;
        }
    }

    $conn->close();
    ?>

</body>

</html>