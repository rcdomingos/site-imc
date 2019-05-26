<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <title>Tela de Cadastro</title>
</head>

<body class="text-center body-roxo">
  <main class="text-center main">
    <div class="box box-cinza rounded d-flex">
      <form class="form-signin" action="../libs/realizaCadastro.php" method="post" oninput='confirmaSenhaUs.setCustomValidity(confirmaSenhaUs.value != senhaUsuario.value ? "Senha está diferente." : "")'>
        <h1 class="h3 mb-3 font-weight-normal">Realize seu Cadastro<h1>

            <label for="nomeUsuario" class="sr-only">Nome: </label>
            <input type="text" name="nomeUsuario" id="nomeUsuario" class="topo form-control" placeholder="Seu Nome" required autofocus>

            <label for="emailUsuario" class="sr-only">Email: </label>
            <input type="email" name="emailUsuario" id="emailUsuario" class="meio form-control" placeholder="Seu email" required>

            <label for="senhaUsuario" class="sr-only">Senha: </label>
            <input type="password" name="senhaUsuario" id="senhaUsuario" class="meio form-control" placeholder="Senha" required>

            <label for="confirmaSenhaUs" class="sr-only">Repita: </label>
            <input type="password" name="confirmaSenhaUs" id="confirmaSenhaUs" class=" ultimo form-control" placeholder="Confirme a Senha">

            <button class="mt-4 btn btn-lg btn-outline-light btn-roxo btn-block" type="submit">Enviar</button>
            <button class="btn btn-lg btn-outline-light btn-roxo btn-block" type="reset">Limpar</button>
      </form>
    </div>
  </main>
</body>

</html>
