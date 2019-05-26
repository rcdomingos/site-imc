<?php
session_start();

//importando os parametros do banco
require_once('../libs/param_conect.php');


//carregar a variaveis do form
$user_login = $_POST['email-id'];
$user_senha = md5($_POST['senha-id']);

//$user_nome = 'Reginaldo';

// echo "user: $us_login e $us_senha";

//Variveis utilizadas na estrutura do query do SQL
$filtro = array($user_login, $user_senha);

$options =  array("Scrollable" => SQLSRV_CURSOR_KEYSET);

/*** Definindo a query. *****/
$tsql = "SELECT nome_usuario ,email_usuario, senha_usuario
         FROM usuario 
         WHERE email_usuario = ?
         AND senha_usuario = ? ";

/*** Executando a query. ****/
$stmt = sqlsrv_query($conn, $tsql, $filtro, $options);


/* Testando a execução */
if ($stmt) {
  echo "Execução com sucesso.\n";
} else {
  echo "Error na execução do select.\n";
  die(formatErrors(sqlsrv_errors()));
}

/** Pegar apenas o primeiro nome do usuario **/
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
$nome_login = explode(" ", $row[0]);

/* imprimindo os resultados para verificação.*/
// while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
//   echo "cod_user: " . $row[0] . "\n";
//   echo "email: " . $row[1] . "\n";
//   echo "senha: " . $row[2] . "\n";
// }

/*** Usando a função sqlsrv_num_rows para verificar se exite o login e carregar a pagina ***/
//echo "\n numero de llinhas: = $row_count\n";
$row_count = sqlsrv_num_rows($stmt);

//validação se o usuario existe cadastrado
if ($row_count  > 0) {
  $_SESSION['nome'] =  $nome_login[0];
  $_SESSION['logado'] = true;
  $_SESSION['userEmail'] = $user_login;
  $_SESSION['userSenha'] = $user_senha;
  header("location: index.php");
  die('O redirecionamento falhou');
} else {
  session_destroy();
  unset($_SESSION['userEmail'],
  $_SESSION['userSenha'],
  $_SESSION['nome'],
  $_SESSION['logado']);
  session_start();
  $_SESSION['info'] = "Usuario não identificado";
  header("location: ../index.php");
  die('O redirecionamento falhou');
};


/* Free statement and connection resources. */
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
