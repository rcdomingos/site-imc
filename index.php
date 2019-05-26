<?php session_start();

if (!isset($_SESSION['info'])) {
  $retorErro = "Acesse o Sistema";
} else {
  $retorErro =  $_SESSION['info'];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Tela de Login</title>
</head>

<body class="body-cinza text-center">

  <main class="text-center main">
    <div class="box box-roxo rounded d-flex">
      <form class="form-signin" action="./app/autenticacao.php" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Calcule seu IMC<h1>
            <label for="email-id" class="sr-only">Login:</label>
            <input type="email" name="email-id" id="inputEmail" class=" topo form-control" placeholder="Seu email" required autofocus>
            <label for="senha-id" class="sr-only">Senha: </label>
            <input type="password" name="senha-id" id="inputPassword" class="ultimo form-control" placeholder="Senha" required>

            <button class="mt-4 btn btn-lg btn-light btn-block" type="submit">Acessar</button>
            <a class="btn btn-lg btn-light btn-block" href="./app/cadastro.php">Cadastro</a>
            <p><small> <?php echo $retorErro ?></small></p>
      </form>
    </div>
  </main>
</body>

</html>
