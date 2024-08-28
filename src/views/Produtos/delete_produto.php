<?php
include('../../includes/protect.php');
include('../../config/conexao.php');

if (!empty($_GET['idProduto'])) {
    $id = $_GET['idProduto'];
    
    // Verifica se a exclusão foi confirmada pelo usuário
    if (isset($_GET['confirmado']) && $_GET['confirmado'] == '1') {
        $sql = "SELECT * FROM `produto` WHERE idProduto=$id";
        $result = mysqli_query($conexao, $sql);
        
        if ($result->num_rows > 0) {
            $sqlDelete = "DELETE FROM `produto` WHERE idProduto=$id";
            $resultDelete = mysqli_query($conexao, $sqlDelete);
            
            if ($resultDelete) {
                echo "<script>alert('produto apagado com sucesso');</script>";
                echo "<script>window.location.href = 'produto.php';</script>";
            } else {
                echo "<script>alert('Não é possivel excluir um produto que ja foi usado em compras ou vendas');</script>";
                echo $conexao->error;
                echo "<script>window.location.href = 'produto.php';</script>";
            }
        }
    } else {
        // Redireciona para a página de confirmação
        echo "<script>
            if (confirm('Tem certeza que deseja excluir?')) {
                window.location.href = 'delete_produto.php?idProduto=$id&confirmado=1';
            } else {
                window.location.href = 'produto.php';
            }
        </script>";
    }
} else {
    echo "<script>window.location.href = 'fornecedor.php';</script>";
}
?>
