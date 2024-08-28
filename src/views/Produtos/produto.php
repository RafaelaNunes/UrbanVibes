<?PHP
include('../../includes/protect.php');
include('../../config/conexao.php');

$sql = "SELECT * FROM produto";
$result = $conexao->query($sql);


if (!empty($_GET['search'])) {

  $pesquisa = $_GET['search'];
  $sql = "SELECT * FROM produto WHERE nome LIKE '%$pesquisa%' or cor LIKE '%$pesquisa%' or quantidade LIKE '%$pesquisa%' ";
  $result = $conexao->query($sql);

} else {
  $sql = "SELECT * FROM produto";
  $result = $conexao->query($sql);

}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <title>Produto</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../css/stylesTabela.css">
</head>

<body>

  <!-- -----------------------------  Menu -------------------------------->
  <div class="menu">
    <div class="barra">
      <nav>
        <div class="linkMenu"> <img src="../../Imagens/Compras.png"> <a class="linkMenu" href="../Compras/Compras.php">
            Compras</a> </div>
        <div class="linkMenu"> <img src="../../Imagens/Pedidos.png"> <a class="linkMenu" href="../Vendas/vendas.php">
            Vendas</a> </div>
        <div class="linkMenu"> <img src="../../Imagens/Fornecedor.png"> <a class="linkMenu"
            href="../Fornecedor/fornecedor.php"> Fornecedor</a> </div>
        <div class="linkMenu"> <img src="../../Imagens/Produtos.png"><a class="linkMenu" href="../Produtos/produto.php">
            Produtos</a> </div>
        <div class="linkMenu"> <img src="../../Imagens/Sair.png"> <a class="linkMenu" href="../auth/logout.php">
            Sair</a> </div>
      </nav>
    </div>
  </div>

  <!-- ----------------------------- Conteudo -------------------------------->
  <div class="conteudo">
   
  <h2 class="tituloPaginas"> Produtos</h2>
    
    <div class="container-pesquisa">
      <input type="search" placeholder="Digite sua pesquisa..." id="pesquisar">
      <button onclick="buscar()" type="submit">Pesquisar</button>
    </div>
    
    <div class="product-container">


      <?php
      // Variáveis para controle de layout
      $count = 0;
      $row_count = 0;

      if ($result->num_rows > 0) {
        // Saída de cada linha
        while ($row = mysqli_fetch_assoc($result)) {
          if ($count % 4 == 0) {
            if ($count > 0) {
              echo '</div>'; // Fecha a fileira anterior
            }
            echo '<div class="product-row">'; // Abre uma nova fileira
          }
          echo '<div class="product">';
          echo '<img class="product-img" src="' . $row["imagem"] . '" alt="' . $row["nome"] . '">'; // Ajuste os nomes dos campos conforme sua tabela
          echo '<h3> ' . $row["nome"] . '</h3>';
          echo '<p>' . $row["cor"] . '</p>';
          echo '<p>quantidade (' . $row["quantidade"] . ')</p>';
          echo "<p><a  href='edit_produto.php?idProduto=$row[idProduto]' ><img class='imgIcone' src='../../Imagens/Vector.png'></a> <a href='delete_produto.php?idProduto=$row[idProduto]' ><img class='imgIcone' src='../../Imagens/deletar.png'></a> </p>";
          echo '</div>';
          $count++;
        }
        // Fecha a última fileira
        if ($count % 4 != 0) {
          echo '</div>';
        }
      }

      ?>

    </div>
    <button class="botaoAdd"><a class="linkBotao" href="add_produto.php">Adicionar</a></button>
  </div>

</body>

<script>
  var search = document.getElementById('pesquisar');

  function buscar() {

    window.location = 'produto.php?search=' + search.value;
  }
</script>

</html>