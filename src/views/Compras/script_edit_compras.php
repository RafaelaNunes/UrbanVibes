<?php
include('../../includes/protect.php');
include('../../config/conexao.php');


if(isset($_POST['atualizar'])){
    $idProduto = $_POST['IdProduto'];
    $quantidadeAtual = $_POST['quantidadeAtual'];
    $idCompra = $_POST['idCompra'];
   
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $data = $_POST['data'];

    
    $sql2 = "SELECT * FROM produto WHERE idProduto=$idProduto";
    echo $idProduto;
    $result2 = mysqli_query($conexao, $sql2);
    $produto = mysqli_fetch_assoc($result2);
    $QtdProduto = $produto['quantidade'];
    $podeAtualizar = false;
    

    if($quantidadeAtual> $quantidade){
        $qtdNova = $quantidadeAtual- $quantidade;
        $qtdNova = $QtdProduto - $qtdNova;
        $sqlAtualizarqtd = "UPDATE `produto` SET `quantidade` = '$qtdNova' WHERE `produto`.`idProduto` = '$idProduto'";
        $resultUpdate = mysqli_query($conexao, $sqlAtualizarqtd);
        $podeAtualizar = true;
    }
    else if($quantidadeAtual<$quantidade){
        $qtdNova = $quantidade- $quantidadeAtual;
        $qtdNova = $QtdProduto + $qtdNova;
        $sqlAtualizarqtd = "UPDATE `produto` SET `quantidade` = '$qtdNova' WHERE `produto`.`idProduto` = '$idProduto'";
        $resultUpdate = mysqli_query($conexao, $sqlAtualizarqtd);
        $podeAtualizar = true;
      }

    
    if($podeAtualizar){
            $sql = "UPDATE compra SET  quantidade='$quantidade', valor='$preco', `data`='$data' WHERE idCompras ='$idCompra'";
            $result = mysqli_query($conexao, $sql);
        if($result){
         echo "<script> alert('Atualização concluida com sucesso');</script>";
        echo "<script>window.location.href = 'compras.php';</script>";
        }else{
        echo "<script> alert('Erro ao efeutar a atualização. Tente novamente');</script>";
        echo $conexao->error;
        echo "<script>window.location.href = 'compras.php';</script>";
        }
}
}

?>
