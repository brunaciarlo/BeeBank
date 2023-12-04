<?php

$nomeContato = $_POST["nomeFavorito"];
$chavePix = $_POST["valorChave"];
$valorTransferencia = $_POST["valorTransferencia"];

$serverName = "localhost";
$database = "bee_bank";
$userName = "root";
$password = "";

if($nomeContato == ""){
  echo "<script> alert('Nome do contato não pode ser vazio');";
  echo "window.location.href = 'listagemFavTransferencia.php';</script>";
  exit;
}
if($chavePix == ""){
  echo "<script> alert('Chave não pode ser vazia');";
  echo "window.location.href = 'listagemFavTransferencia.php';</script>";
  exit;
}
if($valorTransferencia == ""){
  echo "<script> alert('Valor não pode ser vazio');";
  echo "window.location.href = 'listagemFavTransferencia.php';</script>";
  exit;
}

$conn= mysqli_connect($serverName,$userName,    
            $password, $database);

if(!$conn){
    die("Erro na conexão do DB " 
            . mysqli_connect_error());
}
$sqlAddFav = "insert into favoritos (nome, chave_pix) values ('" . $nomeContato ."','" . $chavePix ."')";
mysqli_query($conn,$sqlAddFav);

$sqlSaldo = "SELECT * FROM extrato ORDER BY id DESC LIMIT 1";
$result = $conn->query($sqlSaldo);
$row = $result->fetch_assoc();
$saldo = $row['saldo'];

$saldoAtualizado = $saldo - $valorTransferencia;

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

?>