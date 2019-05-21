
<?php
/** PARAMETROS DE CONEXÃO COM O BANCO DE DADOS */
$serverName = "172.17.0.2,1433";
$connectionOptions = array(
  "database" => "site_IMC",
  "uid" => "SA",
  "pwd" => "Admin@imc"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
  die(formatErrors(sqlsrv_errors()));
}


//função para formatar os erros de retorno do SQLServer
function formatErrors($errors)
{
  // Display errors
  echo "Error information: <br/>";
  foreach ($errors as $error) {
    echo "SQLSTATE: " . $error['SQLSTATE'] . "<br/>";
    echo "Code: " . $error['code'] . "<br/>";
    echo "Message: " . $error['message'] . "<br/>";
  }
}
