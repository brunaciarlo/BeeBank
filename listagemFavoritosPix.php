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
              <a href="./moduloPix.php" style="color: #161E23;"><i class="m-2 me-3 align-middle fa-brands fa-pix fa-xl"></i></a>
            </li>
            <li class="nav-item">
              <a href="./moduloConta.php" style="color: #161E23;"><i class="m-2 align-middle fa-solid fa-user fa-xl fa-xl"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main class="align-middle align-middle mt-5">
    <div class="container">
        <script>

        function deletar(id, nome){
        var resultado = confirm("Deseja remover " +  nome + " dos favoritos?");
        if(resultado == true){
            var url = "processarRemocaoFavorito.php?id=" + id;
            window.location.href = url;
        }
        }

        </script>
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

        $sql = "select id, nome, chave_pix from favoritos";

        $tabela = mysqli_query($conn,$sql) or
            die(mysqli_error($conn));

        echo "<table class='table table-dark table-hover' border=1>";
        echo "<tr><th>Nome</th><th>Chave</th><th></th></tr>";
        echo "<tbody class='table-group-divider'>" ;
        while($linha = mysqli_fetch_array($tabela)){       
            echo "<td>";
                echo $linha["nome"] ;
            echo "</td>";
            
            echo "<td>";
                echo $linha["chave_pix"] ;
            echo "</td>";

            echo "<td>";
            echo "<input class='button-remover' type='button'  value='Remover'
            onclick='deletar(" . $linha['id'] . ", \"" . $linha['nome'] . "\")' />";
            echo "</td>";

            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($conn);
        echo "<button class='button-cadastar-chave' data-bs-toggle='modal' data-bs-target='#favoritosModal'><i class='fa-solid fa-plus'></i> Cadastrar favorito</button>";

        ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="favoritosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: #161E23">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Cadastrar contato</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addChaveForm" action="processaAdicaoFavorito.php" method="post">
      <div class="modal-body">
        <div class="mb-3">
            <label for="nomeFavorito" class="form-label">Nome</label>
            <input type="text" step="any" class="form-control" name="nomeFavorito">
        </div>
        <div class="mb-3">
            <label for="valorChave" class="form-label">Chave</label>
            <input type="text" step="any" class="form-control" name="valorChave">
        </div>
        </div>
            <div class="modal-footer">
                <button type="button" id="button-cancel" class="btn button-cancel" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="button-modal" class="btn button-modal">Cadastrar</button>
            </div>
        </form>
        </div>
        </div>
    </div>
  </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>