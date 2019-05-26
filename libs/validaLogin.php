<?php
session_start();

//VErificar se o usuario esta logado se não limpa os dados e redireciona
if (isset($_SESSION['logado']) === false) {
  //Destrói
  session_destroy();

  //Limpa
  unset($_SESSION['userEmail'],
  $_SESSION['userSenha'],
  $_SESSION['nome'],
  $_SESSION['logado']);
  //Redireciona para a página de autenticação
  header('Location: ../index.php');
};
