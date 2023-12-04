<?php

$valorSaque = $_POST["valorSaque"];

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

$saldoAtualizado = $saldo - $valorSaque;

if($saldo >= $valorSaque){
    $sql = "insert into extrato (tipo_transferencia, valor_transferencia, saldo) values ('Saque'," . $valorSaque ."," . $saldoAtualizado .")";
} else {
    echo "<script> alert('Valor de saque deve ser menor que saldo!');";
    echo "window.location.href = 'moduloConta.php';</script>";
    exit;
}

if(mysqli_query($conn,$sql))    {
    echo "<script> alert('Saque concluído com sucesso!');";
    echo "window.location.href = 'moduloConta.php';</script>";
}else{
    echo "Erro ao gravar transação";
}
mysqli_close($conn);

?>