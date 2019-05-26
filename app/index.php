<?php
require('../libs/validaLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <title>Calculadora IMC</title>
</head>

<body class="body-cinza">
  <nav class="navbar fixed-top navbar-light bg-light">
    <a class="navbar-brand" href="#">Calculadora IMC</a>
    <span class="navbar-text text-right">
      <p>Bem Vindo <?php echo $_SESSION['nome']; ?> | <a href="../libs/logout.php">Sair</a></p>
    </span>
  </nav>

  <main class="text-center main">
    <div class="box box-roxo rounded d-flex">
      <form class="form-signin" name="FormIMC" action="./calculadoraIMC.php" method="post">
        <h1>Cálculo do IMC</h1>
        <p>Preencha o formulario para realizar a verificação do IMC</p>

        <label for="pesoUsuario" class="sr-only">Peso:</label>
        <input type="number" maxlength="5" name="pesoUsuario" id="pesoUsuario" class=" topo form-control" placeholder="Digite o Peso" required>

        <label for=" alturaUsuario" class="sr-only">Altura:</label>
        <input type="number" name="alturaUsuario" id="alturaUsuario" class="ultimo form-control" placeholder="Digite a Altura" required>

        <button class="mt-4 btn btn-lg btn-light btn-block" type="submit">Enviar</button>
        <button class="btn btn-lg btn-light btn-block" type="reset">Limpar</button>

      </form>
    </div>
  </main>

</body>

</html>
