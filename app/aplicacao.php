<?php
require('../libs/validaLogin.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Calculadora IMC</title>
</head>

<body>
  <header>
    <p>Bem Vindo <?php echo $_SESSION['nome']; ?> | <a href="../libs/logout.php">Sair</a></p>
  </header>
  <main>
    <h1>Cálculo do IMC</h1>
    <p>Preencha o formulario para realizar a verificação do IMC</p>
    <form name="FormIMC" action="./calculadoraIMC.php" method="post">
      <div>
        <label for="pesoUsuario">Peso: </label>
        <input type="number" maxlength="5" name="pesoUsuario" id="pesoUsuario" required>
        <span>Kg</span>
      </div>
      <div>
        <label for="alturaUsuario">Altura:</label>
        <input type="number" name="alturaUsuario" id="alturaUsuario" required><span>cm</span>
      </div>
      <button type="submit">Enviar</button>
      <button type="reset">Limpar</button>

    </form>
  </main>
</body>

</html>
