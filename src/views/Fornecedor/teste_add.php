<?php
//conexao com o bd
include('../../config/conexao.php');

//dados que vão ser inseridos
$nome = 'Fornecedor Teste';
$cidade = 'Cidade Teste';
$telefone = '123456789';

//insere os dados
$sql = "INSERT INTO fornecedor (nome, cidade, telefone) VALUES ('$nome', '$cidade', '$telefone')";
$result = $conexao->query($sql);

//verifica se deu certo
if ($result) {
    echo "Fornecedor adicionado com sucesso!";
} else {
    echo "Erro ao adicionar fornecedor: " . $conexao->error;
}

$conexao->close();
?>