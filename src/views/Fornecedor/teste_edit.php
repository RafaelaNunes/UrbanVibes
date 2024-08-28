<?php
//conexao com o bd
include('../../config/conexao.php');

//dados que vão ser adicionados
$nome = 'Fornecedor para Editar';
$cidade = 'Cidade Teste';
$telefone = '123456789';

//insere os dados
$sql = "INSERT INTO fornecedor (nome, cidade, telefone) VALUES ('$nome', '$cidade', '$telefone')";
$conexao->query($sql);
$id = $conexao->insert_id;

//novo nome para o fornecedor
$novoNome = 'Fornecedor Editado';

//vditar o fornecedor adicionado
$sqlEdit = "UPDATE fornecedor SET nome = '$novoNome' WHERE idfornecedor = $id";
$resultEdit = $conexao->query($sqlEdit);

//verificar se a edição deu certo
if ($resultEdit) {
    // Verificar se o fornecedor foi realmente atualizado
    $sqlCheck = "SELECT nome FROM fornecedor WHERE idfornecedor = $id";
    $resultCheck = $conexao->query($sqlCheck);
    $fornecedor = $resultCheck->fetch_assoc();

    if ($fornecedor['nome'] === $novoNome) {
        echo "Fornecedor atualizado com sucesso!";
    } else {
        echo "Erro: Fornecedor não foi atualizado corretamente.";
    }
} else {
    echo "Erro ao atualizar fornecedor: " . $conexao->error;
}

$conexao->close();
?>