<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tela de Cadastro</title>
</head>

<body>
  <section>
    <form action="../libs/realizaCadastro.php" method="post" oninput='confirmaSenhaUs.setCustomValidity(confirmaSenhaUs.value != senhaUsuario.value ? "Senha está diferente." : "")'>
      <div>
        <label for="nomeUsuario">Nome: </label>
        <input type="text" name="nomeUsuario" id="nomeUsuario">
      </div>
      <div>
        <label for="emailUsuario">Email: </label>
        <input type="email" name="emailUsuario" id="emailUsuario">
      </div>
      <div>
        <label for="senhaUsuario">Senha: </label>
        <input type="password" name="senhaUsuario" id="senhaUsuario">
      </div>
      <div>
        <label for="confirmaSenhaUs">Repita: </label>
        <input type="password" name="confirmaSenhaUs" id="confirmaSenhaUs">
      </div>
      <button type="submit">Enviar</button>
      <button type="reset">Limpar</button>
    </form>
  </section>
</body>

</html>
