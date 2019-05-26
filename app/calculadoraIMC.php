<?php
require('../libs/validaLogin.php');
//Variavies
$peso = $_POST['pesoUsuario'];
$altura = $_POST['alturaUsuario'];
$altura = str_replace(".", "", $altura);
$altura = str_replace(",", "", $altura);
$altura = $altura / 100;

$emailUsuario = $_SESSION['userEmail'];
$senhaUsuario = $_SESSION['userSenha'];

/* pegar a data e hora atual */
date_default_timezone_set('America/Sao_Paulo');
$data_registro = date('Y-m-d');
$hora_registro = date("H:i:s");


//realizando o calculo
$imc = number_format(($peso / ($altura * $altura)), 2, '.', '');;
// 1234.57

//verificando a situação do IMC
if ($imc < 17) {
  $situacao = "Muito abaixo do peso";
} else if ($imc > 17 && $imc <= 18.49) {
  $situacao = "Abaixo do peso";
} else if ($imc >= 18.5 && $imc <= 24.99) {
  $situacao = "Peso normal";
} else if ($imc >= 25 && $imc <= 29.99) {
  $situacao = "Acima do peso";
} else if ($imc >= 30 && $imc <= 34.99) {
  $situacao = "Obesidade I";
} else if ($imc >= 35 && $imc <= 39.99) {
  $situacao = "Obesidade II (severa)";
} else if ($imc >= 40) {
  $situacao = "Obesidade III (mórbida)";
}


//importando os parametros do banco
require('../libs/param_conect.php');

/** PEGANDO AS INFORMAÇÕES DO ID USUARIO **/
$tsql_id = "SELECT id_usuario FROM usuario  WHERE email_usuario = ? AND senha_usuario = ?";
$param_id = array($emailUsuario, $senhaUsuario);

$options =  array("Scrollable" => SQLSRV_CURSOR_KEYSET);

/*executando a query do select */
$stmt_id = sqlsrv_query($conn, $tsql_id, $param_id, $options);

/* Testando a execução */
if (!$stmt_id) {
  echo "Error na execução do select.\n";
  die(formatErrors(sqlsrv_errors()));
} else {
  /** Pegar apenas o ID do Usuario **/
  $row = sqlsrv_fetch_array($stmt_id, SQLSRV_FETCH_NUMERIC);
  $id_login = $row[0];
  // echo "ID do Usuario: " . $id_login;

  /** INSERINDO OS DADOS DO HISTORICO DO USUARIO **/
  /* QUERY DO INSERT */
  $tsql = "INSERT INTO historico_imc ( id_usuario,imc_registro,data_registro, hora_registro)  
            VALUES (?, ?, ?,?)";
  $parameters = array($id_login, $imc, $data_registro, $hora_registro);

  $stmt = sqlsrv_query($conn, $tsql, $parameters, $options);
  if ($stmt === false) {
    $retornoHistorico = 'Não foi possivel salvar o historico';
    die();
  } else {
    $retornoHistorico = 'Historico Salvo com sucesso';
  }
  sqlsrv_free_stmt($stmt);
}


/*** FECHANDO A CONEXÃO COM O BANCO E LIBERANDO AS VARIAVEIS ***/
sqlsrv_free_stmt($stmt_id);
sqlsrv_close($conn);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <title>Resultado</title>
</head>

<body class="body-cinza">
  <nav class="navbar fixed-top navbar-light bg-light">
    <a class="navbar-brand" href="#">Calculadora IMC</a>
    <span class="navbar-text text-right">
      <p>Bem Vindo <?php echo $_SESSION['nome']; ?> | <a href="../libs/logout.php">Sair</a></p>
    </span>
  </nav>

  <main class="text-center main">
    <div class="box box-roxo rounded">
      <h1>Resultado</h1>
      <p class="text-left imc">IMC:<span> <?php echo $imc; ?></span></p>
      <p class="text-left"><?php echo $situacao; ?></p>
      <p class="text-left"><small>obs: <?php echo  $retornoHistorico; ?> </small></p>

      <a class="btn btn-lg btn-light btn-block" href="./index.php">Novo cálculo</a>
    </div>
  </main>
</body>

</html>
