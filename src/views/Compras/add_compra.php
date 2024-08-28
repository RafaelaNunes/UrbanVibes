<?php
include '../../includes/protect.php';
include '../../config/conexao.php';

$sqlProduto = "SELECT * FROM `produto` ";
$resultProduto= mysqli_query($conexao, $sqlProduto);

$sqlFornecedor = "SELECT * FROM `fornecedor` ";
$resultFornecedor= mysqli_query($conexao, $sqlFornecedor);

if(isset($_POST['cadastrar'])){
    $IdFornecedor = $_POST['fornecedor'];
    $IdProduto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $data = $_POST['data'];
    $valorFinal = $quantidade * $preco ;


    $sql2 = "SELECT * FROM produto WHERE idProduto=$IdProduto";
    $result2 = mysqli_query($conexao, $sql2);
    $produto = mysqli_fetch_assoc($result2);
    $QtdAtual = $produto['quantidade'];
    
    

    $sql = "INSERT INTO `compra` (`idFornecedor`,`idProduto`, `quantidade`, `valor` ,`valorFinal` ,`data`) VALUES ('$IdFornecedor','$IdProduto','$quantidade','$preco','$valorFinal','$data')";
    $result = mysqli_query($conexao, $sql);
      
        if($result){
        echo "<script> alert('Cadastro concluido com sucesso');</script>";
        echo "<script>window.location.href = 'compras.php';</script>";
        $QtdNova = $QtdAtual + $quantidade;
        echo $QtdNova;
        $sqlAtualizarqtd = "UPDATE `produto` SET `quantidade` = '$QtdNova' WHERE `produto`.`idProduto` = '$IdProduto'";
        $resultUpdate = mysqli_query($conexao, $sqlAtualizarqtd);
       }
       
       else{
       echo "<script> alert('Erro ao efeutar o cadastro. Tente novamente');</script>";
     // echo $conexao->error;
       echo "<script>window.location.href = 'add_compra.php';</script>";
       }
    }


?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/stylesFormulario.css">
    <title>Adicionar Compra</title>
</head>
<body>

<div class="containerFormulario">
    <div class="areaFormulario">
        <form action="add_compra.php" method="POST">

            <h2 class="tituloFormulario">Adicionar Compra</h2> 

            <div class="campoFormulario">
               <select name="fornecedor">
                <option value="Selecione"> Selecione o Fornecedor </option>
                <?php
                while ($dadosFor = mysqli_fetch_assoc($resultFornecedor)) {
                ?> 
               <option value="<?php echo $dadosFor['idfornecedor']?>"> <?php echo $dadosFor['nome']?></option>
               <?php
                }
                ?> 
               
               </select>
            </div>

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
                <a href="compras.php" class="botao voltar">Voltar</a>
                <button type="submit" name ="cadastrar" class="botao cadastrar">Cadastrar</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>


