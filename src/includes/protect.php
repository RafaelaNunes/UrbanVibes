<?PHP
if(!isset($_SESSION)){
    session_start();
}


if(!isset( $_SESSION['idusuario'])){
    echo "<script> alert('Para acessar essa pagina faça primeiro o login');</script>";
    echo "<script>window.location.href = '../../index.php';</script>";
}



?>