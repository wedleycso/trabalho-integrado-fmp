<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="">
</head>

<body>
  <div class="jumbotron">
    <h1 class="display-4">Lista de Clientes</h1>
    <p class="lead">Sugestão de escrita na pág</p>
  </div>
  <button type="button" classe="btn btn-primary">
    <a class="btn btn-primary" href="index.php" role="button">Voltar</a>
  </button>
  <div class="card mb-3 p-3 rounded-sm">
    <table class="table table-hover">
      <thead>
          <tr>
          <th scope="col"></th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
          </tr>
      </thead>

      <tbody>
        <tr>
          <th scope="row">Nome</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">Endereço</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>	
          <th scope="row">Telefone</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">Status</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>

        <?php
        include 'conexao.php';

        $sql = "SELECT id_cliente, nome, endereco, telefone FROM cliente";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nome"] . "</td>
                        <td>" . $row["endereco"] . "</td>
                        <td>" . $row["telefone"] . "</td>
                        <td><a href='excluir_cliente.php?id_cliente=" . $row["id_cliente"] . "' onclick='return confirm(\"Tem certeza que deseja excluir este cliente?\")'>Excluir</a></td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum cliente encontrado</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>