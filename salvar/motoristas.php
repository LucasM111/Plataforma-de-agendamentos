<?php
    require "../configs/conexao.php";
    require "../configs/functions.php";

    
    if (!$_POST) 
        mensagem("Erro", "Requisição inválida");

    //recuperar os dados digitados no formulário
    print_r($_POST);
    $id = trim($_POST["id"] ?? NULL);
    $nome = trim($_POST["nome"] ?? NULL);
    $sobrenome = trim($_POST["sobrenome"] ?? NULL);
    $veiculo = trim($_POST["veiculo"] ?? NULL);


    //verificar se esses campos estão em branco
    if (empty($nome))
        mensagem("Erro","Preencha o modelo");
    if (empty($sobrenome))
        mensagem("Erro","Preencha a placa");
    if (empty($veiculo))
        mensagem("Erro","Preencha o veiculo");


    
    //verificar se vamos dar um insert ou um update
    if (empty($id)) {
        //insert
        $sql = "insert into motoristas values (NULL, :nome, :sobrenome, :veiculo)";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":nome", $nome);
        $consulta->bindParam(":sobrenome", $sobrenome);
        $consulta->bindParam(":veiculo", $veiculo);
        

    } else {
        //update
        $sql = "update motoristas set nome = :nome, sobrenome = :sobrenome, veiculo = :veiculo where id = :id limit 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":nome", $nome);
        $consulta->bindParam(":sobrenome", $sobrenome);
        $consulta->bindParam(":veiculo", $veiculo);

    }

    if ( $consulta->execute() ){
        mensagem("Sucesso","Registro salvo/alterado com sucesso");
    } else {
        mensagem("Erro","Não foi possível salvar ou alterar o registro");
    } 