<?php
//conexao com o bd
include('../../config/conexao.php');

//dados para inserir
$nome = 'Fornecedor para Delete';
$cidade = 'Cidade Teste';
$telefone = '123456789';

//insere os dados
$sql = "INSERT INTO fornecedor (nome, cidade, telefone) VALUES ('$nome', '$cidade', '$telefone')";
$conexao->query($sql);
$id = $conexao->insert_id;

//exclui o fornecedor que havia sido adicionado
$sqlDelete = "DELETE FROM fornecedor WHERE idfornecedor = $id";
$resultDelete = $conexao->query($sqlDelete);

//ver se deu certo
if ($resultDelete) {
    //verificar se o fornecedor foi realmente excluído
    $sqlCheck = "SELECT * FROM fornecedor WHERE idfornecedor = $id";
    $resultCheck = $conexao->query($sqlCheck);

    if ($resultCheck->num_rows === 0) {
        echo "Fornecedor excluído com sucesso!";
    } else {
        echo "Erro: Fornecedor ainda encontrado no banco de dados.";
    }
} else {
    echo "Erro ao excluir fornecedor: " . $conexao->error;
}

$conexao->close();
?>