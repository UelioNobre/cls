<?php

require_once 'includes/includes.php';

// setando o id do produto
if (array_key_exists('id', $_GET)) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$produto = ProdutoDetalhes::getInstance();
$produto->getProduto($id);
?>