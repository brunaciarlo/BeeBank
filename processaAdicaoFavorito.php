<?php

$nomeFavorito = $_POST["nomeFavorito"];
$chaveFavorito = $_POST["valorChave"];

if($nomeFavorito == ""){
  echo "<script> alert('Nome do contato não pode ser vazio');";
  echo "window.location.href = 'listagemFavoritosPix.php';</script>";
  exit;
}
if($chaveFavorito == ""){
  echo "<script> alert('Chave não pode ser vazia');";
  echo "window.location.href = 'listagemFavoritosPix.php';</script>";
  exit;
}
if(strlen($chaveFavorito) != 11){
  echo "<script> alert('Chave inválida!');";
  echo "window.location.href = 'listagemFavoritosPix.php';</script>";
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

$sql = "insert into favoritos (nome, chave_pix) values ('" . $nomeFavorito ."','" . $chaveFavorito ."')";

if(mysqli_query($conn,$sql))    {
    header('Location: listagemFavoritosPix.php');
}else{
    echo "Erro ao gravar favorito";
}
mysqli_close($conn);

?>