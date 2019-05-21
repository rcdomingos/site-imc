<?php
//recebendo as variaveis do Formulario de cadastro
$nomeUsuario = $_POST['nomeUsuario'];
$emailUsuario = $_POST['emailUsuario'];
$senhaUsuario = md5($_POST['senhaUsuario']); //usando md5 para criptografar a senha

$nome_login = explode(" ", $nomeUsuario);

//importando os parametros do banco
require('../libs/param_conect.php');

/*** QUERY QUE SERÁ EXCECUTADA NO TABELA USUARIO ***/
$tsql_email = "SELECT email_usuario FROM usuario   WHERE email_usuario = ?";

$tsql = "INSERT INTO usuario  ( nome_usuario ,email_usuario, senha_usuario)  
         VALUES (?, ?, ?)";

/*** VETOR COM OS PARAMETROS QUE SARÃO CADASTRADOS ***/
$param_email = array($emailUsuario);

$parameters = array($nomeUsuario,  $emailUsuario, $senhaUsuario);
$options =  array("Scrollable" => SQLSRV_CURSOR_KEYSET);

/* EXECUTANDO O QUERY DO SELECT NO BANCO. */
//$stmt = sqlsrv_execute($conn, $tsql, $parameters, $options);

/* Verificar se o email ja esta cadastrado  */
$stmt_email = sqlsrv_query($conn, $tsql_email, $param_email, $options);
$row_count_email = sqlsrv_num_rows($stmt_email);

if ($stmt_email === false) {
  die(formatErrors(sqlsrv_errors()));
} else {
  if ($row_count_email > 0) {
    echo "E-mail utilizado ja cadastrado";
  } else {
    /* EXECUTANDO O QUERY DE INSERT NO BANCO. */
    $stmt = sqlsrv_query($conn, $tsql, $parameters, $options);
    /***VERIFICANDO SE HOUVE ERROS ***/
    if ($stmt === false) {
      die(formatErrors(sqlsrv_errors()));
    } else {
      /* acessar a pagina da aplicação com o usuario logado */
      // echo "Rows affected: " . sqlsrv_rows_affected($stmt) . "\n";
      session_start();
      $_SESSION['logado'] = true;
      $_SESSION['nome'] = $nome_login[0];
      $_SESSION['userEmail'] = $emailUsuario;
      $_SESSION['userSenha'] = $senhaUsuario;
      header("location: ../app/aplicacao.php");
    }
    sqlsrv_free_stmt($stmt);
  }
}
/*** FECHANDO A CONEXÃO COM O BANCO E LIBERANDO AS VARIAVEIS ***/
sqlsrv_free_stmt($stmt_email);
sqlsrv_close($conn);
