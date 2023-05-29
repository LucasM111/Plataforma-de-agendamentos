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
    $sqlAgendamentos = "select * from agendamentos where id = :id limit 1";
    $consultaAgendamentos = $pdo->prepare($sqlAgendamentos);
    $consultaAgendamentos->bindParam(":id", $id);
    $consultaAgendamentos->execute();

    $dados = $consultaAgendamentos->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$nome = $dados->nome ?? NULL;
$veiculo = $dados->veiculo ?? NULL;
$data = $dados->data ?? NULL;
$hora = $dados->hora ?? NULL;
$motivo = $dados->motivo ?? NULL;
$n_visitantes = $dados->n_visitantes ?? NULL;
$produto = $dados->produto ?? NULL;


?>

<div class="card">
    <div class="card-header">
        <strong>Novos Agendamentos</strong>

        <div class="float-end">
            <a href="" class="btn btn-info btn-sm">
                Listar Agendamentos
            </a>
        </div>
    </div>
    <div class="card-body">
        <form name="formagendamentos" method="post" action="../salvar/agendamentos" data-parsley-validate="">
            <br>

            <!-- ID -->
            <label for="id">ID:</label>
            <input type="text" name="id" id="id" class="form-control" readonly value="<?=$id?>">
            <br>

            <!-- Nome -->
            <label for="agendamentos">Digite o nome do visitante:</label>
            <input type="text" name="agendamentos" id="agendamentos" class="form-control"
            required data-parsley-required-message="Por favor, preencha este campo"
            value="<?=$nome?>">
            <br>

            <!-- Veiculo -->
            <label for = "veiculo_id">Escolha o Veiculo</label>
            <select name = "veiculo_id" id = "veiculo_id" class = "form-control" required data-parsley-required-message = "Selecione um veiculo">
                <option value = "">Selecione</option> 
                <?php
                     $sqlVeiculo = "Select * from veiculos order by modelo";
                     $consultaVeiculo = $pdo->prepare($sqlVeiculo);
                     $consultaVeiculo->execute();

                     while ($dadosVeiculo = $consultaVeiculo->fetch(PDO::FETCH_OBJ)){
                         ?>
                             <option value = "<?=$dadosVeiculo->id?>">
                             <?=$dadosVeiculo->modelo?>
                            </option> 

                        <?php
                    }
                ?>
            </select>
            <br>

            <!-- Data do Agendamento -->
            <label for="datavisita">Data de agendamento</label>
            <input type="date" name="datavisita" id="datavisita" class="form-control"
            required data-parsley-required-message="Por favor, preencha este campo"
            value="<?=$data?>">
            <br>

            <!-- Hora do Agendamento -->
            <label for="horavisita">Hora</label>
            <input type="time" name="horavisita" id="horavisita" class="form-control"
            required data-parsley-required-message="Por favor, preencha este campo"
            value="<?=$id?>">
            <br>

            <!-- Motivo do Agendamento -->
            <label for="motivo">Motivo agendamento</label>
            <input type="text" name="motivo" id="motivo" class="form-control"
            required data-parsley-required-message="Por favor, preencha este campo"
            value="<?=$hora?>">
            <br>

            <!-- Quantidade de pessoas que vão comparecer ao estabelecimento -->
            <label for="qvistante">Digite a quantidade de visitantes:</label>
            <input type="number" name="qvistante" id="qvistante" class="form-control"
            required data-parsley-required-message="Por favor, preencha este campo"
            value="<?=$n_visitantes?>">
            <br>
            
            <!-- Produto a ser transportado, seja ele coleta, ou entrega -->
            <label for="produto">Produto</label>
            <input type="text" name="produto" id="produto" class="form-control"
            required data-parsley-required-message="Por favor, preencha este campo"
            value="<?=$produto?>">
            <br>

            <button type="submit" class="btn btn-success">
                <i class=""></i> Salvar Dados
            </button>
        </form>
    </div>
</div>