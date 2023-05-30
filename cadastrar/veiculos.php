<?php
include "../configs/conexao.php";

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!----- arquivos css ---->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <link rel="stylesheet" href="../css/summernote-lite.min.css">
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <!----- arquivos javascript ---->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/parsley.min.js"></script>
    <script src="../js/summernote-lite.min.js"></script>
    <script src="../js/summernote-pt-BR.js"></script>
    <script src="../js/sweetalert2.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/vanilla-masker.js"></script>



</head>
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="../home.php">
      <img src="../imagens/Ltech.png" alt="Ltech" width="80" height="80" class = "ltech">
    </a>
  </div>
</nav>
  <div class="container-fluid">
    <a class="navbar-brand" href="../home.php">Agendamentos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../pages/sobre.php">Sobre a Plataforma</a>
        </li>

      </ul>
    </div>
</ul>
  </div>
</nav>
</header>


<?php
  //verificar se o id não está vazio
  if (!empty($id)) {
    $sqlVeiculos = "select * from veiculos where id = :id limit 1";
    $consultaVeiculos = $pdo->prepare($sqlVeiculos);
    $consultaVeiculos->bindParam(":id", $id);
    $consultaVeiculos->execute();

    $dados = $consultaVeiculos->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$modelo= $dados->modelo?? NULL;
$placa = $dados->placa ?? NULL;
?>



<div class="card">
    <div class="card-header">
        <strong>Novos Veiculos</strong>

        <div class="float-end">
            <a href="../listar/veiculos.php" class="btn btn-info btn-sm">
              <i class="fas fa-search"></i> Listas de Veiculos
            </a>
        </div>
    </div>
    <div class="card-body">
        <form name="formveiculos" method="post" action="../salvar/veiculos.php" data-parsley-validate="">
            <br>
            
            <!-- ID -->
            <label for="id">ID:</label>
            <input type="text" name="id" id="id" class="form-control" readonly value="<?=$id?>">
            <br>

            <!-- Modelo -->
            <label for="modelo">Digite o Modelo do Veiculo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control"
            required data-parsley-required-message="Por favor, preencha este campo"
            value="">
            <br>

            <!-- Placa -->
            <label for="placa">Placa do Veiculo</label>
            <input type="text" name="placa" id="placa" class="form-control"
            required data-parsley-required-message="Por favor, preencha este campo"
            value="">
            <br>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-check"></i> Salvar Dados
            </button>
        </form>
    </div>
</div>
