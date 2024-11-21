<?php
include "../../crud/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Capturar os valores enviados pelo formulário
  $email_cliente = $_POST["email_cliente"];
  $nome_cliente = $_POST["nome_cliente"];
  $telefone_cliente = $_POST["telefone_cliente"];

  $nome_cliente = $_POST["nome_colaborador"];
  $cargo_colaborador = $_POST["cargo_colaborador"];

  $sql_cadastro_responsavel = "INSERT INTO colaboradores (nome_colaborador, cargo_colaborador) 
                     VALUES ('$nome_colaborador', '$cargo_colaborador')";
  // Criar a consulta SQL
  $sql_cadastro = "INSERT INTO clientes (email_cliente, nome_cliente, telefone_cliente) 
                     VALUES ('$email_cliente', '$nome_cliente', '$telefone_cliente')";

  // Executar a consulta SQL
  if ($conn->query($sql_cadastro) === TRUE and $conn->query($sql_cadastro_responsavel) === TRUE) {
    echo "<div style='color: green;'>Cadastro realizado com sucesso!</div>";
  } else {
    echo "<div style='color: red;'>Erro: " . $conn->error . "</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/style.css">
  <link rel="stylesheet" href="../../styles/cliente.css">
  <title>Cliente</title>
</head>

<body>
  <section>
    <form class="form" action="cadastro.php" method="POST">
      <p id="register-title">Cadastro</p>
      <span class="input-span">
        <label for="email_cliente" class="label">Email</label>
        <input type="email" name="email_cliente" id="email" required placeholder="Ex.: email@gmail.com" maxlength="255" /></span>
      <span class="input-span">
        <label for="nome_cliente" class="label">Nome Completo</label>
        <input type="text" name="nome_cliente" id="password" required placeholder="Ex.: Luisinho da Silva" maxlength="255" /></span>
      <span class="input-span">
        <label for="telefone_cliente" class="label">Telefone</label>
        <input type="number" name="telefone_cliente" id="password" required placeholder="Ex.:47912345678" /></span>
      <span class="input-span">
        <label for="nome_colaborador" class="label">Nome Colaborador Responsável</label>
        <input type="text" name="nome_colaborador" id="password" required placeholder="Ex.: Ronaldo Almeida" /></span>
      <select name="cargo_colaborador" class="label">
        <option value="Desenvolvedor">Desenvolvedor</option>
        <option value="Supervisor de Atendimento ao Cliente">Supervisor de Atendimento ao Cliente</option>
        <option value="Suporte Técnico">Suporte Técnico</option>
      </select>
      <input class="submit" type="submit" value="Cadastrar" />
    </form>
  </section>
</body>

</html>