<?php
include('../BancoDeDados/protect.php');
include('../BancoDeDados/conexao.php');

if(isset($_POST['atualizar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE fornecedor SET  nome='$nome', cidade='$cidade', telefone='$telefone' WHERE idfornecedor='$id'";
    $result = mysqli_query($conexao, $sql);
   
    if($result){
    echo "<script> alert('Atualização concluida com sucesso');</script>";
    echo "<script>window.location.href = 'fornecedor.php';</script>";
    }else{
    echo "<script> alert('Erro ao efeutar a atualização. Tente novamente');</script>";
    echo $conexao->error;
    echo "<script>window.location.href = 'fornecedor.php';</script>";
    }
}

?>
