<?PHP
include('../BancoDeDados/protect.php');
include('../BancoDeDados/conexao.php');

$sql = "SELECT * FROM fornecedor";
$result = $conexao->query($sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title> Fornecedor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../CSS/estiloTabela.css">
</head>
<body>

   <!-- ----------------------------- TOPO -------------------------------->

  <!-- ----------------------------- TOPO -------------------------------->
  
  <div class="menu"> 
    <div class="barra">
          
      <nav>
        <div class="linkMenu">  <img src="../Imagens/Compras.png"> <a class="linkMenu" href="sair.php"> Compras</a> </div> 
        <div class="linkMenu">  <img src="../Imagens/Pedidos.png"> <a class="linkMenu" href="sair.php"> Pedido</a> </div> 
        <div class="linkMenu">  <img src="../Imagens/Relatorios.png"> <a class="linkMenu" href="sair.php"> Relatorios</a> </div>
        <div class="linkMenu">  <img src="../Imagens/Fornecedor.png"> <a class="linkMenu" href="sair.php"> Fornecedor</a> </div>
        <div class="linkMenu">  <img src="../Imagens/Produtos.png"><a class="linkMenu" href="sair.php">  Produtos</a> </div>
        <div class="linkMenu">  <img src="../Imagens/Sair.png"> <a class="linkMenu" href="../Login/sair.php"> Sair</a> </div>

      
      </nav>
    
    </div>
  
</div>
  
  <div class="conteudo">

    <h2 class="tituloPaginas"> Forncedor</h2>
	
    <table class="tabelaPadrao">
        
        <thead >
          <tr class="topoTabela">
         
            <th >Nome</th>
            <th scope="col">Cidade</th>
            <th scope="col">Telefone</th>
            <th scope="col" >Editar</th>
            <th scope="col" >Excluir</th>
          </tr>
        </thead>

        <tbody>
          
        <?php
        while ($user_fornecedor = mysqli_fetch_assoc($result)) {
          $num_colunas=
          $classe = ($user_fornecedor['idfornecedor'] % 2 == 0) ? 'linhaBranca' : 'linhaCinza';
         
              echo "<tr class='$classe'>";
              echo "<td>".$user_fornecedor['nome']."</td>";
              echo "<td>".$user_fornecedor['cidade']."</td>";
              echo "<td>".$user_fornecedor['telefone']."</td>";
              echo "<td><a href='formulario_edit_fornecedor.php?idfornecedor=$user_fornecedor[idfornecedor]'><img src='../Imagens/Vector.png' width='25' height='25'</a></td>";
              echo "<td> <a href='formulario_delet_fornecedor.php?idfornecedor=$user_fornecedor[idfornecedor]'><img src='../Imagens/deletar.png' width='25' height='25'></a></td ";
              echo"</tr>";
        }
              
             
        
        ?>
        
      </table>


      <button class="botaoAdd"><a class="linkBotao" href="formulario_add_fornecedor.php">Adicionar novo</a></button>

      
	

</body>
</html>