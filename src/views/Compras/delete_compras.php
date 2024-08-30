<?php
include('../../includes/protect.php');
include('../../config/conexao.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $idProduto= $_GET['idProduto'];
    echo''.$id.''.$idProduto.'';
    
    // Verifica se a exclusão foi confirmada pelo usuário
    if (isset($_GET['confirmado']) && $_GET['confirmado'] == '1') {
        $sql = "SELECT * FROM `compra` WHERE idCompras =$id";
        $result = mysqli_query($conexao, $sql);
        $CompraDelete = mysqli_fetch_assoc($result);
        $quantidadeCompra = $CompraDelete["quantidade"];

        $sql2 = "SELECT * FROM produto WHERE idProduto=$idProduto";
        $result2 = mysqli_query($conexao, $sql2);
        $produto = mysqli_fetch_assoc($result2);
        $QtdProduto = $produto['quantidade'];

        $qtdNova = $QtdProduto- $quantidadeCompra;


        
        
        if ($result->num_rows > 0) {
            $sqlDelete = "DELETE FROM `compra` WHERE idCompras =$id";
            $resultDelete = mysqli_query($conexao, $sqlDelete);

            $sqlUpdate =" UPDATE `produto` SET `quantidade` = '$qtdNova' WHERE `produto`.`idProduto` = '$idProduto'";
            $result3 = mysqli_query($conexao, $sqlUpdate);
            if ($resultDelete) {
                echo "<script>alert('Compra apagado com sucesso');</script>";
                echo "<script>window.location.href = 'compras.php';</script>";
            } else {
                echo "<script>alert('Erro ao efeutar a exclusão. Tente novamente');</script>";
             //   echo $conexao->error;
                echo "<script>window.location.href = 'compras.php';</script>";
            }
        }
    } else {
        // Redireciona para a página de confirmação
        echo "<script>
            if (confirm('Tem certeza que deseja excluir?')) {
                window.location.href = 'delete_compras.php?id=$id&confirmado=1&idProduto=$idProduto';
            } else {
                window.location.href = 'compras.php';
            }
        </script>";
    }
} else {
    echo "<script>window.location.href = 'compras.php';</script>";
}
?>
