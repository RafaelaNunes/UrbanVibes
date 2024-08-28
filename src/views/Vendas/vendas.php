<?PHP
include('../../includes/protect.php');
include('../../config/conexao.php');


if(!empty($_GET['search'])){
    
    $pesquisa =$_GET['search'];
    $sql = "SELECT * FROM venda WHERE perco LIKE '%$pesquisa%' or quantidade LIKE '%$pesquisa%' or valorTotal LIKE '%$pesquisa%' ";
    $result = $conexao->query($sql);
  }else{
    $sql = "SELECT * FROM venda";
    $result = $conexao->query($sql);

}


?>
<!DOCTYPE html>
<html>
<head>
	<title> Fornecedor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/stylesTabela.css">
</head>
<body>

   <!-- ----------------------------- Menu -------------------------------->
   <div class="menu"> 
    <div class="barra">
          
      <nav>
        <div class="linkMenu">  <img src="../../Imagens/Compras.png"> <a class="linkMenu" href="../Compras/Compras.php"> Compras</a> </div> 
        <div class="linkMenu">  <img src="../../Imagens/Pedidos.png"> <a class="linkMenu" href="../Vendas/vendas.php"> Vendas</a> </div> 
        <div class="linkMenu">  <img src="../../Imagens/Relatorios.png"> <a class="linkMenu" href="../Relatorios/relatorios.php"> Relatorios</a> </div>
        <div class="linkMenu">  <img src="../../Imagens/Fornecedor.png"> <a class="linkMenu" href="../Fornecedor/fornecedor.php"> Fornecedor</a> </div>
        <div class="linkMenu">  <img src="../../Imagens/Produtos.png"><a class="linkMenu" href="../Produtos/produto.php">  Produtos</a> </div>
        <div class="linkMenu">  <img src="../../Imagens/Sair.png"> <a class="linkMenu" href="../auth/logout.php"> Sair</a> </div>
      </nav>
    
    </div>
  
</div>

  <!-- ----------------------------- Conteudo -------------------------------->
  

  
  <div class="conteudo">

  <h2 class="tituloPaginas"> Vendas</h2>

<div class="container-pesquisa">
    <input type="search" placeholder="Digite sua pesquisa..." id="pesquisar">
    <button onclick="buscar()" type="submit">Pesquisar</button>
</div>

  <div class="conteudo-tabela">

   
	
    <table class="tabelaPadrao">
        
        <thead >
          <tr class="topoTabela">
         
            <th >Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preco</th>
            <th scope="col" >ValorTotal</th>
            <th scope="col" >Data</th>
            <th scope="col" >Editar</th>
            <th scope="col" >Excluir</th>
          </tr>
        </thead>

        <tbody>
          
        <?php
        while ($dados = mysqli_fetch_assoc($result)) {

          
          $classe = ($dados['id'] % 2 == 0) ? 'linhaBranca' : 'linhaCinza';
        
          $IdProduto = $dados['IdProduto'];
        
          $sqlProduto = "SELECT * FROM `produto` WHERE idProduto =$IdProduto";
          $resultProduto= mysqli_query($conexao, $sqlProduto); 
          $nomeProduto = mysqli_fetch_assoc($resultProduto);
         
         
              echo "<tr class='$classe'>";
              echo "<td>".$nomeProduto['nome']."</td>";
              echo "<td>".$dados['quantidade']."</td>";
              echo "<td>R$".$dados['preco']."</td>";
              echo "<td>R$".$dados['valorTotal']."</td>";
              echo "<td>".$dados['data']."</td>";
              echo "<td><a href='edit_vendas.php?id=$dados[id]' ><img src='../../Imagens/Vector.png' width='25' height='25'</a></td>";
              echo "<td> <a href='delet_vendas.php?id=$dados[id]'><img src='../../Imagens/deletar.png' width='25' height='25'></a></td ";
              echo"</tr>";
        }
              
             
        
        ?>
        
      </table>


      
     </div>
     <button class="botaoAdd"><a class="linkBotao" href="add_venda.php">Adicionar novo</a></button>
  </div>
      
</body>

<script>
  var search = document.getElementById('pesquisar');

  function buscar(){
   
    window.location = 'fornecedor.php?search='+ search.value;
  }
</script>
</html>