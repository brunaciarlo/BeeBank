<?php

$valorTransferencia = $_POST["valorTransferencia"];

if($valorTransferencia == ""){
  echo "<script> alert('Valor não pode ser vazio');";
  echo "window.location.href = 'listagemFavTransferencia.php';</script>";
  exit;
}

$serverName = "localhost";
$database = "bee_bank";
$userName = "root";
$password = "";

$conn= mysqli_connect($serverName,$userName,    
            $password, $database);

if(!$conn){
    die("Erro na conexão do DB " 
            . mysqli_connect_error());
}

$sqlSaldo = "SELECT * FROM extrato ORDER BY id DESC LIMIT 1";
$sqlVerificacao = "select * from chaves_pix";
$result = $conn->query($sqlSaldo);
$resultVerificacao = $conn->query($sqlVerificacao);
$row = $result->fetch_assoc();
$saldo = $row['saldo'];

$saldoAtualizado = $saldo - $valorTransferencia;

if($resultVerificacao->num_rows > 0){
  if($saldo >= $valorTransferencia){
    $sql = "insert into extrato (tipo_transferencia, valor_transferencia, saldo) values ('Pix'," . $valorTransferencia ."," . $saldoAtualizado .")";
  } else {
    echo "<script> alert('Valor de transferência deve ser menor que saldo!');";
    echo "window.location.href = 'listagemFavTransferencia.php';</script>";
    exit;
  }

  if(mysqli_query($conn,$sql))    {
    echo "<script> alert('Pix enviado com sucesso!');";
    echo "window.location.href = 'listagemFavTransferencia.php';</script>";
  }else{
    echo "Erro ao gravar transação";
  }
  mysqli_close($conn);
} else{
  echo "<script> alert('É necessário ter uma chave pix cadastrada para fazer um pix!');";
  echo "window.location.href = 'listagemFavTransferencia.php';</script>";
  exit;
}


?>