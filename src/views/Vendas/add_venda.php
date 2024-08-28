<?php
include '../../includes/protect.php';
include '../../config/conexao.php';

$sqlProduto = "SELECT * FROM `produto` ";
$resultProduto= mysqli_query($conexao, $sqlProduto);

if(isset($_POST['cadastrar'])){
    $IdProduto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $data = $_POST['data'];
    $valorFinal = $quantidade * $preco ;


    $sql2 = "SELECT * FROM produto WHERE idProduto=$IdProduto";
    $result2 = mysqli_query($conexao, $sql2);
    $produto = mysqli_fetch_assoc($result2);
    $QtdAtual = $produto['quantidade'];
    
    if($QtdAtual > $quantidade){

    $sql = "INSERT INTO `venda` (`IdProduto`, `quantidade`, `preco` ,`valorTotal` ,`data`) VALUES ('$IdProduto','$quantidade','$preco','$valorFinal','$data')";
    $result = mysqli_query($conexao, $sql);
      
        if($result){
        echo "<script> alert('Cadastro concluido com sucesso');</script>";
        echo "<script>window.location.href = 'vendas.php';</script>";
        $QtdNova = $QtdAtual -  $quantidade;
        echo $QtdNova;
        $sqlAtualizarqtd = "UPDATE `produto` SET `quantidade` = '$QtdNova' WHERE `produto`.`idProduto` = '$IdProduto'";
        $resultUpdate = mysqli_query($conexao, $sqlAtualizarqtd);
       }
       
       else{
       echo "<script> alert('Erro ao efeutar o cadastro. Tente novamente');</script>";
     // echo $conexao->error;
       echo "<script>window.location.href = 'add_venda.php';</script>";
       }
    }else{

       echo "<script> alert('Quantidade Selecionada maior que disponivel em estoque');</script>";
     // echo $conexao->error;
       echo "<script>window.location.href = 'add_venda.php';</script>";

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
        <form action="add_venda.php" method="POST">

            <h2 class="tituloFormulario">Adicionar venda</h2> 

            <div class="campoFormulario">
               <select name="produto">
                <option value="Selecione"> Selecione o produto </option>
                <?php
                while ($dados = mysqli_fetch_assoc($resultProduto)) {
                ?> 
               <option value="<?php echo $dados['idProduto']?>"> <?php echo $dados['nome']?></option>
               <?php
                }
                ?> 
               
               </select>
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Quantidade:</label>
                <input class="campo_formulario" type="number" name="quantidade" required>
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Preço</label>
                <input class="campo_formulario" type="number" step="0.01" name="preco" required>
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">data</label>
                <input class="campo_formulario" type="date" id="float" name="data" required>
            </div>

            <div class="areaAcao">
                <a href="vendas.php" class="botao voltar">Voltar</a>
                <button type="submit" name ="cadastrar" class="botao cadastrar">Cadastrar</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>


