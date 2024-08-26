<?php
include('../../includes/protect.php');
include('../../config/conexao.php');


if(!empty($_GET['idProduto'])){

    $id = $_GET['idProduto'];
    
    $sql = "SELECT * FROM `produto` WHERE idProduto=$id";
    $result = mysqli_query($conexao, $sql);
   
    
    if($result->num_rows){
        while($produto = mysqli_fetch_assoc($result)){
        $nome = $produto['nome'];
        $cor =  $produto['cor'];
        $quantidade =  $produto['quantidade'];
        $imagem =  $produto['imagem'];

        }

        

    }else{
        header('Location produto.php');
    }
}

?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/stylesFormulario.css">
    <title>Produto</title>
</head>
<body>

<div class="containerFormulario">
    <div class="areaFormulario">
        <form action="script_edit_produto.php" method="POST">

            <h2 class="tituloFormulario">Editar Produto</h2> 

            <div class="campoFormulario">
                <label class="labelFormulario">Nome:</label>
                <input class="campo_formulario" type="text" name="nome" value = "<?php echo $nome?>" >
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Cor:</label>
                <input class="campo_formulario" type="text" name="cor" value = "<?php echo $cor?>" >
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Quantidade</label>
                <input class="campo_formulario" type="text" name="quantidade" value = "<?php echo $quantidade?>">
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Imagem:</label>
                <input class="campo_formulario" type="file" name="imagem" value = "<?php echo $imagem?> ">
            </div>

            <div class="areaAcao">
                <a href="produto.php" class="botao voltar">Voltar</a>
                <button type="submit" name ="atualizar" class="botao cadastrar">Atualizar</button>
            </div>

            <input class="campo_formulario" type="hidden" name="id" value = "<?php echo $id?>" required>

        </form>
    </div>
</div>

</body>
</html>
