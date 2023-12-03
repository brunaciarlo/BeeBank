<?php

$id = $_GET["id"];

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

$sql = "delete from favoritos where id = " . $id;

if(mysqli_query($conn,$sql))    {
    header('Location: listagemFavoritosPix.php');
}else{
    echo "Erro ao deletar chave de id = " + $id;
}

mysqli_close($conn);

?>