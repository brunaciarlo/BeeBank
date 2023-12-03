<?php

$valorDeposito = $_POST["valorDeposito"];

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
$result = $conn->query($sqlSaldo);
$row = $result->fetch_assoc();
$saldo = $row['saldo'];

$saldoAtualizado = $saldo + $valorDeposito;

$sql = "insert into extrato (tipo_transferencia, valor_transferencia, saldo) values ('Deposito'," . $valorDeposito ."," . $saldoAtualizado .")";


if(mysqli_query($conn,$sql))    {
    header('Location: moduloConta.html');
}else{
    echo "Erro ao gravar transação";
}
mysqli_close($conn);

?>