<?php
include('../../includes/protect.php');
include('../../config/conexao.php');

if (!empty($_GET['idfornecedor'])) {
    $id = $_GET['idfornecedor'];
    
    // Verifica se a exclusão foi confirmada pelo usuário
    if (isset($_GET['confirmado']) && $_GET['confirmado'] == '1') {
        $sql = "SELECT * FROM `fornecedor` WHERE idfornecedor=$id";
        $result = mysqli_query($conexao, $sql);
        
        if ($result->num_rows > 0) {
            $sqlDelete = "DELETE FROM `fornecedor` WHERE idfornecedor=$id";
            $resultDelete = mysqli_query($conexao, $sqlDelete);
            
            if ($resultDelete) {
                echo "<script>alert('Fornecedor apagado com sucesso');</script>";
                echo "<script>window.location.href = 'fornecedor.php';</script>";
            } else {
                echo "<script>alert('Erro ao efeutar a exclusão. Tente novamente');</script>";
                echo $conexao->error;
                echo "<script>window.location.href = 'fornecedor.php';</script>";
            }
        }
    } else {
        // Redireciona para a página de confirmação
        echo "<script>
            if (confirm('Tem certeza que deseja excluir?')) {
                window.location.href = 'formulario_delet_fornecedor.php?idfornecedor=$id&confirmado=1';
            } else {
                window.location.href = 'fornecedor.php';
            }
        </script>";
    }
} else {
    echo "<script>window.location.href = 'fornecedor.php';</script>";
}
?>
