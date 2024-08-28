<?php
include('../../includes/protect.php');
include('../../config/conexao.php');


if(!empty($_GET['id'])){

    $idCompra = $_GET['id'];
    $idFornecedor = $_GET['idFornecedor'];
    $idProduto = $_GET['idProduto'];
  
    $sql = "SELECT * FROM `compra` WHERE idCompras=$idCompra";
    $result = mysqli_query($conexao, $sql);
   
    if($result->num_rows){
    
        while($dados = mysqli_fetch_assoc($result)){
       
        $sql2 = "SELECT * FROM `produto` WHERE idProduto =$idProduto";
        $resultProduto= mysqli_query($conexao, $sql2); 
        $nomeProduto = mysqli_fetch_assoc($resultProduto);
        $Produto = $nomeProduto['nome'];

        
        $sql3 = "SELECT * FROM `fornecedor` WHERE idfornecedor =$idFornecedor";
        $resultFornecedor= mysqli_query($conexao, $sql3); 
        $nomeFornecedor = mysqli_fetch_assoc($resultFornecedor);
        $fornecedor =   $nomeFornecedor['nome'];
              
        $quantidade = $dados['quantidade'];
        $preco = $dados['valor'];
        $data = $dados['data'];
        }

        

    }else{
        header('Location vendas.php');
    }
}

?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/stylesFormulario.css">
    <title>Editar Compras</title>
</head>
<body>

<div class="containerFormulario">
    <div class="areaFormulario">
        <form action="script_edit_compras.php" method="POST">

            <h2 class="tituloFormulario">Editar Compra</h2> 

            
            <div class="campoFormulario">
               <select name="fornecedor">
                <option > <?php echo $fornecedor?> </option>
               </select>
            </div>

            <div class="campoFormulario">
               <select name="produto">
                <option > <?php echo $Produto?> </option>
               </select>
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Quantidade:</label>
                <input class="campo_formulario" type="number" name="quantidade" value = "<?php echo $quantidade?>">
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">Preço:</label>
                <input class="campo_formulario" type="number" step="0.01" name="preco" value = "<?php echo $preco?>">
            </div>

            <div class="campoFormulario">
                <label class="labelFormulario">data</label>
                <input class="campo_formulario" type="date" id="float" name="data" value = "<?php echo $data?>">
            </div>

            <div class="areaAcao">
                <a href="compras.php" class="botao voltar">Voltar</a>
                <button type="submit" name ="atualizar" class="botao cadastrar">Atualizar</button>
            </div>
            
            <input class="campo_formulario" type="hidden" name="idCompra" value = "<?php echo $idCompra?>" required>
            <input class="campo_formulario" type="hidden" name="quantidadeAtual" value = "<?php echo $quantidade?>" required>
            <input class="campo_formulario" type="hidden" name="IdProduto" value = "<?php echo $idProduto?>" required>


        </form>
    </div>
</div>

</body>
</html>


