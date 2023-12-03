<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Logos/beebank.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>B&E Bank</title>
</head>
<body style="background-color: #161E23; color: aliceblue;">
  <header>
    <nav class="navbar navbar-expand-lg" style="background-color: #f9d552;">
      <div class="container-fluid">
        <a class="navbar-brand ms-3" href="./">
          <img src="./Logos/1x/Artboard 3.png" alt="Logo" width="140" class="d-inline-block align-text-top">
        </a>
        <div class="d-flex justify-content-end me-4" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-2">
            <i class="bi bi-house-door-fill"></i>
            <li class="nav-item">
              <a href="./moduloPix.html" style="color: #161E23;"><i class="m-2 me-3 align-middle fa-brands fa-pix fa-xl"></i></a>
            </li>
            <li class="nav-item">
              <a href="./moduloConta.html" style="color: #161E23;"><i class="m-2 align-middle fa-solid fa-user fa-xl fa-xl"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main class="align-middle align-middle mt-5">
    <div class="container">
        <div class="col">
            <div class="row">
                <a href="listagemFavoritosPix.php"><button id="buttonVoltar"><i class="fa-solid fa-arrow-left-long"></i> Voltar</button></a>
            </div>
        </div>
    </div>
</body>

<?php

$nomeFavorito = $_POST["nomeFavorito"];
$chaveFavorito = $_POST["valorChave"];

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