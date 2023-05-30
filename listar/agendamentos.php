<?php
include "../configs/conexao.php";
include "../configs/functions.php";

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



<div class="card">
    <div class="card-header">
        <strong>Listas de Agendamentos</strong>

        <div class="float-end">
            <a href="../cadastrar/agendamentos.php" class="btn btn-success btn-sm" title="Novo registro">
                <i class="fas fa-file"></i> Novo Agendamento
            </a>
            <a href="../listar/agendamentos.php" class="btn btn-info btn-sm">
                <i class="fas fa-search"></i> Listar Agendamentos
            </a>
        </div>
    </div>
    <div class="card-body">
    <table class = "table table-houver table-bordered table-striped">
            <thead>
                <tr>
                    <td>Numero de Agendamento</td>
                    <td>Nome do Visitante</td>
                    <td>Veiculo</td>
                    <td>Motorista Responsavel</td>
                    <td>Data</td>
                    <td>Hora</td>
                    <td>Motivo</td>
                    <td>N° Visitantes</td>
                    <td>Produto</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>
            <?php
                $sqlAgendamentos = "select * from agendamentos order by data";
                $consultaAgendamento = $pdo->prepare($sqlAgendamentos);
                $consultaAgendamento->execute();

                while ($d = $consultaAgendamento->fetch(PDO::FETCH_OBJ)){
                    ?>
                        <tr>
                            <td><?=$d->id?></td>
                            <td><?=$d->nome?></td>
                            <td><?=$d->veiculo?></td>
                            <td><?=$d->motorista?></td>
                            <td><?=$d->data?></td>
                            <td><?=$d->hora?></td>
                            <td><?=$d->motivo?></td>
                            <td><?=$d->n_visitantes?></td>
                            <td><?=$d->produto?></td>
                            <td class = text-center>
                                <!-- Icone Editar  -->
                                <a href = "../cadastrar/agendamentos.php/<?=$d->id?>" title = "Editar" class = "btn btn-success btn-sm">
                                    <i class = "fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>

                        <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    //iniciar o dataTables
    $(document).ready(function(){
        $(".table").DataTable({
            language: {
                lengthMenu: 'Mostrar _MENU_ registros por página',
                zeroRecords: 'Sem resultados encontrados',
                info: 'Mostrando página _PAGE_ de _PAGES_',
                infoEmpty: 'Nenhum resultado',
                infoFiltered: '(Filtrando de _MAX_ resultados)',
                search: 'Busca',
            },
        });
    })

</script>
    