<?php
include('../../includes/protect.php');
include('../../config/conexao.php');

if(isset($_POST['atualizar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];
    $quantidade = $_POST['quantidade'];
    $imagem	= $_POST['imagem'];
  
    $sql = "UPDATE produto SET  nome='$nome', cor='$cor', quantidade='$quantidade' WHERE idProduto='$id'";
    $result = mysqli_query($conexao, $sql);
   
    if($result){
    echo "<script> alert('Atualização concluida com sucesso');</script>";
    echo "<script>window.location.href = 'produto.php';</script>";
    }else{
    echo "<script> alert('Erro ao efeutar a atualização. Tente novamente');</script>";
    echo $conexao->error;
    echo "<script>window.location.href = 'produto.php';</script>";
    }
}

?>
