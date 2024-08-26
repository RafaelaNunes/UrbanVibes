
<?php
include('../../includes/protect.php');
include('../../config/conexao.php');

if(isset($_POST['cadastrar'])){

    $dir = "../../Imagens/";
    $file = $_FILES['imagem'];

    if(move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])){
        echo "Arquivo enviado com sucesso";
    }else{
        echo" Arquivo não enviado"; 
    }

    $nome = $_POST['nome'];
    $cor = $_POST['cor'];
    $quantidade = $_POST['quantidade'];
    $imagem = "$dir".$file["name"];
   


    $sql = "INSERT INTO produto (nome, cor, quantidade, imagem ) VALUES ('$nome','$cor','$quantidade','$imagem')";
    $result = mysqli_query($conexao, $sql);
    if($result){
    echo "<script> alert('Cadastro concluido com sucesso');</script>";
    echo "<script>window.location.href = 'produto.php';</script>";
    }else{
   echo "<script> alert('Erro ao efeutar o cadastro. Tente novamente');</script>";
  //  echo $conexao->error;
    echo "<script>window.location.href = 'add_produto.php';</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/stylesFormulario.css">
    <title>Adicionar Produto</title>
</head>
<body>

<div class="containerFormulario">
    <div class="areaFormulario">
        <form action="add_produto.php" method="POST" enctype = "multipart/form-data">

            <h2 class="tituloFormulario">Adicionar Produto</h2> 

            <div class="campoFormulario">
                <label class="labelFormulario">Nome:</label>
                <input class="campo_formulario" type="text" name="nome">
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Cor:</label>
                <input class="campo_formulario" type="text" name="cor">
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Quantidade:</label>
                <input class="campo_formulario" type="text" name="quantidade" >
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Imagem:</label>
                <input class="campo_formulario" type="file" name="imagem" >
            </div>

            <div class="areaAcao">
                <a href="produto.php" class="botao voltar">Voltar</a>
                <button type="submit" name ="cadastrar" class="botao cadastrar">Cadastrar</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>
