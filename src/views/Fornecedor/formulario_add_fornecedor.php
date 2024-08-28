<?php
include('../../includes/protect.php');
include('../../config/conexao.php');


if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $telefone = $_POST['telefone'];

    $sqlVerificacao = "SELECT * FROM fornecedor";
    $resultVerificacao = mysqli_query($conexao,  $sqlVerificacao);
    $exite = false;
    
    while ($fornecedor = mysqli_fetch_assoc($resultVerificacao)) {
        if($fornecedor["nome"] == $nome){
            $exite = true;
        }
    }

    if(!$exite){
        $sql = "INSERT INTO `fornecedor` (`nome`, `cidade`, `telefone`) VALUES ('$nome','$cidade','$telefone')";
        $result = mysqli_query($conexao, $sql);
      
        if($result){
        echo "<script> alert('Cadastro concluido com sucesso');</script>";
        echo "<script>window.location.href = 'fornecedor.php';</script>";
        }else{
        echo "<script> alert('Erro ao efeutar o cadastro. Tente novamente');</script>";
    //  echo $conexao->error;
        echo "<script>window.location.href = 'formulario_add_fornecedor.php';</script>";
        }
    }else{
        echo "<script> alert('Não foi possivel concluir o cadastro pois ja existe um fornecedor com esse nome');</script>";
        echo "<script>window.location.href = 'fornecedor.php';</script>";
    }
}


?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/stylesFormulario.css">
    <title>Adicionar Fornecedor</title>
</head>
<body>

<div class="containerFormulario">
    <div class="areaFormulario">
        <form action="formulario_add_fornecedor.php" method="POST">

            <h2 class="tituloFormulario">Adicionar Fornecedor</h2> 

            <div class="campoFormulario">
                <label class="labelFormulario">Nome:</label>
                <input class="campo_formulario" type="text" name="nome" required>
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Cidade:</label>
                <input class="campo_formulario" type="text" name="cidade" required>
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Telefone:</label>
                <input class="campo_formulario" type="text" name="telefone" required>
            </div>

            <div class="areaAcao">
                <a href="fornecedor.php" class="botao voltar">Voltar</a>
                <button type="submit" name ="cadastrar" class="botao cadastrar">Cadastrar</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>


