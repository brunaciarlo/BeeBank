<?php

$chave = $_POST["valorChave"];
$tipoChave = $_POST["tipoChave"];

if($chave == ""){
    echo "<script> alert('Chave não pode ser vazia');";
    echo "window.location.href = 'listagemChavesPix.php';</script>";
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

if($tipoChave == "1"){

    $sqlVerificacao = "select * from chaves_pix where tipo_chave='Telefone'";
    $result = $conn->query($sqlVerificacao);

    if ($result->num_rows > 0){
        echo "<script> alert('Já existe uma chave telefone cadastrada!');";
        echo "window.location.href = 'listagemChavesPix.php';</script>";
        exit;
    } else{
        if($chave != ""){
            $sql = "insert into chaves_pix (tipo_chave, chave_pix) values ('Telefone'," . $chave .")";

            if(mysqli_query($conn,$sql))    {
                header('Location: listagemChavesPix.php');
            }else{
                echo "Erro ao gravar transação";
            }
            mysqli_close($conn);
        }else{
            echo "<script> alert('Chave não pode ser vazio');";
            echo "window.location.href = 'listagemChavesPix.php';</script>";
            exit;
        }
    }
}

if($tipoChave == "2"){

    $sqlVerificacao = "select * from chaves_pix where tipo_chave='CPF'";
    $result = $conn->query($sqlVerificacao);

    if ($result->num_rows > 0){
        echo "<script> alert('Já existe uma chave CPF cadastrada!');";
        echo "window.location.href = 'listagemChavesPix.php';</script>";
        exit;
    } else{
        if($chave != ""){
            $sql = "insert into chaves_pix (tipo_chave, chave_pix) values ('CPF'," . $chave .")";

            if(mysqli_query($conn,$sql))    {
                header('Location: listagemChavesPix.php');
            }else{
                echo "Erro ao gravar transação";
            }
            mysqli_close($conn);
        } else{
            echo "<script> alert('Chave não pode ser vazio');";
            echo "window.location.href = 'listagemChavesPix.php';</script>";
            exit;
        }
    }
}

?>