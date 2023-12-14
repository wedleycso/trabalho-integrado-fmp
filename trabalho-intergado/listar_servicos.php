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
    <h1 class="display-4">Lista de Serviços</h1>
    <p class="lead">Sugestão de escrita na pág</p>
  </div>
  <button type="button" classe="btn btn-primary">
    <a class="btn btn-primary" href="index.php" role="button">Voltar</a>
  </button>
  <div class="card mb-3 p-3 rounded-sm">
    <table class="table table-hover">
      <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Data de Agendamento</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"></th>
          <td></td>
          <td></td>
          <td></td>
        </tr>


        <?php
        include 'conexao.php';

        $sql = "SELECT id_servico, titulo, descricao, data_agendamento, status, DATEDIFF(data_agendamento, CURDATE()) AS diferenca_dias 
        FROM servicos 
        ORDER BY diferenca_dias ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["titulo"] . "</td>
                        <td>" . $row["descricao"] . "</td>
                        <td>" . $row["data_agendamento"] . "</td>
                        <td>" . $row["status"] . "<form method='post' action='atualizar_status.php'>

                        <input type='hidden' name='id_servico' value=" . $row['id_servico'] . ">
                        <label for='novoStatus'>Novo Status:</label>
                        <select id='novoStatus' name='novoStatus' required>
                            <option value='Pendente'>Pendente</option>
                            <option value='Em andamento'>Em Andamento</option>
                            <option value='Finalizado'>Finalizado</option>
                        </select>
                        <button type='submit'>Alterar Status</button>
                    </form>" . "</td>

                    <td> 
                    <a href='excluir_servico.php?id_servico=" . $row["id_servico"] . "' onclick=\"return confirm('Tem certeza que deseja excluir este serviço?')\">Excluir</a>
                    </td>

                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum serviço encontrado</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>