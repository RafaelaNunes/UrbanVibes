<?php
include('../BancoDeDados/protect.php');
include('../BancoDeDados/conexao.php');

if(!empty($_GET['idfornecedor'])){

    $id = $_GET['idfornecedor'];
    
    $sql = "SELECT * FROM `fornecedor` WHERE idfornecedor=$id";
    $result = mysqli_query($conexao, $sql);
   
    if($result->num_rows>0){
    
        $sqlDelete = "DELETE FROM `fornecedor` WHERE idfornecedor=$id";
        $resultDelete = mysqli_query($conexao, $sqlDelete );

        if($result){
            echo "<script> alert('Fornecedor apagado com sucesso');</script>";
            echo "<script>window.location.href = 'fornecedor.php';</script>";
         }else{
            echo "<script> alert('Erro ao efeutar a exclusão. Tente novamente');</script>";
            echo $conexao->error;
            echo "<script>window.location.href = 'fornecedor.php';</script>";
            }

    }

}else{
    echo "<script>window.location.href = 'fornecedor.php';</script>";
}

?>
