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
  <title>Tela de Login</title>
</head>

<body>
  <form action="./app/autenticacao.php" method="post">
    <label for="email-id">Login:
      <input type="email" name="email-id" id="email-id">
    </label><br>
    <label for="senha-id">Senha:
      <input type="password" name="senha-id" id="senha-id">
    </label><br>
    <button type="submit">Acessar</button>
    <a href="./app/cadastro.php"><button type="button">Cadastro</button></a>
    <p> <?php echo $retorErro ?></p>
  </form>

</body>

</html>
