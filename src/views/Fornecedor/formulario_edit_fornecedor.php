<?php
include('../../includes/protect.php');
include('../../config/conexao.php');


if(!empty($_GET['idfornecedor'])){

    $id = $_GET['idfornecedor'];
    
    $sql = "SELECT * FROM `fornecedor` WHERE idfornecedor=$id";
    $result = mysqli_query($conexao, $sql);
   
    if($result->num_rows){
    
        while($user_fornecedor = mysqli_fetch_assoc($result)){
        $nome = $user_fornecedor['nome'];
        $cidade = $user_fornecedor['cidade'];
        $telefone = $user_fornecedor['telefone'];
        }

        

    }else{
        header('Location fornecedor.php');
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
        <form action="script_edit_fornecedor.php" method="POST">

            <h2 class="tituloFormulario">Editar Fornecedor</h2> 

            <div class="campoFormulario">
                <label class="labelFormulario">Nome:</label>
                <input class="campo_formulario" type="text" name="nome" value = "<?php echo $nome?>" required>
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Cidade:</label>
                <input class="campo_formulario" type="text" name="cidade" value = "<?php echo $cidade?>" required>
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Telefone:</label>
                <input class="campo_formulario" type="text" name="telefone" value = "<?php echo $telefone?>" required>
            </div>

            <div class="areaAcao">
                <a href="fornecedor.php" class="botao voltar">Voltar</a>
                <button type="submit" name ="atualizar" class="botao cadastrar">Atualizar</button>
            </div>

            <input class="campo_formulario" type="hidden" name="id" value = "<?php echo $id?>" required>

        </form>
    </div>
</div>

</body>
</html>
