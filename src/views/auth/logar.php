<?php
include('../../config/conexao.php');
session_start();

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $sql = $conexao->query($sql) or die("Falha na execução do codigo" . $conexao->error);
    $quantidade = $sql->num_rows;

    if($quantidade == 1){
        $usuario = $sql->fetch_assoc();
        $_SESSION['idusuario']= $usuario['idusuario'];

        header("Location: ../Fornecedor/fornecedor.php");

    }else{
        echo "<script> alert('Falha ao logar! Email ou senha incorretos');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
    }





}else{
    echo "<script> alert('Preencha os campos de login e senha');</script>";
    echo "<script>window.location.href = 'login.html';</script>";
    
}


?>