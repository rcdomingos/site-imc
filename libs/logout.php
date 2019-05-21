<?php
session_start();

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

unset($_SESSION['userEmail'],
$_SESSION['userSenha'],
$_SESSION['nome'],
$_SESSION['logado']);

$_SESSION['info'] = "Sessão encerrada com sucesso";
//redirecionar o usuario para a página de login
header("Location: ../index.php");
