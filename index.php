<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!----- arquivos css ---->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/summernote-lite.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <!----- arquivos javascript ---->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/parsley.min.js"></script>
    <script src="js/summernote-lite.min.js"></script>
    <script src="js/summernote-pt-BR.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/vanilla-masker.js"></script>



</head>
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="home.php">
      <img src="imagens/Ltech.png" alt="Ltech" width="80" height="80" class = "ltech">
    </a>
  </div>
</nav>
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Agendamentos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pages/sobre.php">Sobre a Plataforma</a>
        </li>

      </ul>
    </div>
</ul>
  </div>
</nav>
</header>

<body>
<div class="row row-cols-1 row-cols-md-3 g-1">
  <div class="col">
    <div class="card h-100">
      <img src="imagens/cad.png" class="w-50" alt="Cadastro de Agendamento">
      <div class="card-body">
        <h5 class="card-title">Gerar Agendamentos</h5>
        <p class="card-text">Aqui voce poderá cadastrar um novo agendamento.</p>
      </div>
      <a href="cadastrar/agendamentos.php" class="btn btn-info btn-sm" title="Novo registro">
        Cadastrar Novo Agendamento
      </a>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="imagens/cadveiculo.png" class="w-50" alt="Cadastro de Veiculo">
      <div class="card-body">
        <h5 class="card-title">Cadastro do Veiculo</h5>
        <p class="card-text">Aqui voce poderá cadastrar o veiculo que fará a visita</p>
      </div>
      <a href="cadastrar/veiculos.php" class="btn btn-info btn-sm" title="Novo registro">
        Cadastrar Novo Agendamento
      </a>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="imagens/cadpessoa.png" class="w-50" alt="Cadastro de Motorista">
      <div class="card-body">
        <h5 class="card-title">Cadastro de Motorista</h5>
        <p class="card-text">Faça o cadastro do motorista.</p>
      </div>
      <a href="cadastrar/motorista.php" class="btn btn-info btn-sm" title="Novo registro">
        Cadastrar Novo Agendamento
      </a>
    </div>
  </div>
</div>



</body>
</html>