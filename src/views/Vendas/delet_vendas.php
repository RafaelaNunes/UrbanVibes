<?php
include('../../includes/protect.php');
include('../../config/conexao.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Verifica se a exclusão foi confirmada pelo usuário
    if (isset($_GET['confirmado']) && $_GET['confirmado'] == '1') {
        $sql = "SELECT * FROM `venda` WHERE id=$id";
        $result = mysqli_query($conexao, $sql);
        $vendaDelete = mysqli_fetch_assoc($result);
        $idProduto = $vendaDelete["IdProduto"];
        $quantidadeVenda = $vendaDelete["quantidade"];

        $sql2 = "SELECT * FROM produto WHERE idProduto=$idProduto";
        $result2 = mysqli_query($conexao, $sql2);
        $produto = mysqli_fetch_assoc($result2);
        $QtdProduto = $produto['quantidade'];

        $qtdNova =  $quantidadeVenda +  $QtdProduto;

        
        
        if ($result->num_rows > 0) {
            $sqlDelete = "DELETE FROM `venda` WHERE id=$id";
            $resultDelete = mysqli_query($conexao, $sqlDelete);

            $sqlUpdate =" UPDATE `produto` SET `quantidade` = '$qtdNova' WHERE `produto`.`idProduto` = '$idProduto'";
            
            if ($resultDelete) {
                echo "<script>alert('Venda apagado com sucesso');</script>";
                echo "<script>window.location.href = 'vendas.php';</script>";
            } else {
                echo "<script>alert('Erro ao efeutar a exclusão. Tente novamente');</script>";
                echo $conexao->error;
                echo "<script>window.location.href = 'vendas.php';</script>";
            }
        }
    } else {
        // Redireciona para a página de confirmação
        echo "<script>
            if (confirm('Tem certeza que deseja excluir?')) {
                window.location.href = 'delet_vendas.php?id=$id&confirmado=1';
            } else {
                window.location.href = 'vendas.php';
            }
        </script>";
    }
} else {
    echo "<script>window.location.href = 'vendas.php';</script>";
}
?>
