<!DOCTYPE html>
<html lang="pt-BR">
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
  <?php
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
  ?>
  <main class="align-middle align-middle mt-5">
    <div class="col d-flex justify-content-center my-5 flex-column ml-5">
      <div class="container">
        <h2>Conta</h2>
        <h2>Saldo $<?php echo $saldo ?></h2>
        <br><br>
        <div class="row">
          <div class="col">
            <button class="button-index" data-bs-toggle="modal" data-bs-target="#depositarModal"><i class="fa-solid fa-arrow-down" style="color: #146551;"></i> Depositar</button>
          </div>
          <div class="col">
            <button class="button-index" data-bs-toggle="modal" data-bs-target="#sacarModal"><i class="fa-solid fa-arrow-up" style="color: #52130C;"></i> Sacar</button>
          </div>
          <div class="col">
            <a href="processaSaldo.php"><button class="button-index"><i class="fa-regular fa-file-lines"></i> Extrato</button></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="depositarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Depositar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="depositoForm" action="processaDeposito.php" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="valorDeposito" class="form-label">Valor</label>
            <input type="number" step="any" class="form-control" name="valorDeposito">
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" id="button-cancel" class="btn button-cancel" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" id="button-modal" class="btn button-modal">Depositar</button>
          </div>
      </form>
      </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="sacarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Sacar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saqueForm" action="processaSaque.php" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="valorSaque" class="form-label">Valor</label>
            <input type="number" step="any" class="form-control" name="valorSaque">
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" id="button-cancel" class="btn button-cancel" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" id="button-modal" class="btn button-modal">Sacar</button>
      </div>
      </form>
      </div>
      </div>
    </div>
  </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
