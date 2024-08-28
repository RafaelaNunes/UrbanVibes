<?php
include('../../includes/protect.php');
include('../../config/conexao.php');


if(!empty($_GET['id'])){

    $idVenda = $_GET['id'];
    
    $sql = "SELECT * FROM `venda` WHERE id=$idVenda";
    $result = mysqli_query($conexao, $sql);
   
    if($result->num_rows){
    
        while($dados = mysqli_fetch_assoc($result)){
       
        $IdProduto = $dados['IdProduto'];
        echo $IdProduto;
        $sql2 = "SELECT * FROM `produto` WHERE idProduto =$IdProduto";
        $resultProduto= mysqli_query($conexao, $sql2); 
       
      
       while( $nomeProduto = mysqli_fetch_assoc($resultProduto)){
            $Produto = $nomeProduto['nome'];
       }



        
        $quantidade = $dados['quantidade'];
        $preco = $dados['preco'];
        $data = $dados['data'];
        }

        

    }else{
        header('Location vendas.php');
    }
}

?>

<?php
include('../../includes/protect.php');
include('../../config/conexao.php');



?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/stylesFormulario.css">
    <title>Editar Vendas</title>
</head>
<body>

<div class="containerFormulario">
    <div class="areaFormulario">
        <form action="script_edit_vendas.php" method="POST">

            <h2 class="tituloFormulario">Editar venda</h2> 

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
                <a href="vendas.php" class="botao voltar">Voltar</a>
                <button type="submit" name ="atualizar" class="botao cadastrar">Atualizar</button>
            </div>
            
            <input class="campo_formulario" type="hidden" name="id" value = "<?php echo $idVenda?>" required>
            <input class="campo_formulario" type="hidden" name="quantidadeAtual" value = "<?php echo $quantidade?>" required>
            <input class="campo_formulario" type="hidden" name="IdProduto" value = "<?php echo $IdProduto?>" required>


        </form>
    </div>
</div>

</body>
</html>


