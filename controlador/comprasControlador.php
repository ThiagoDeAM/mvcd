<?php

require_once "modelo/produtoModelo.php";

function adicionar($idProduto) {
    if (isset($_SESSION["carrinho"])) {
        $produtos = $_SESSION["carrinho"];
    } else {
        $produtos = [];
    }
    $produtos[] = pegarProdutoPorId($idProduto);
    $_SESSION["carrinho"] = $produtos;
    redirecionar("compras/listar");
}

function listar() {
    if (isset($_SESSION["carrinho"])) {
        $produtos = $_SESSION["carrinho"];
        $_SESSION["carrinho"] = $produtos;
    } else {
        $produtos = [];
    }
    $dados = $produtos;
    exibir("carrinho/inicial", $dados);
}

function limparCarrinho() {
    unset($_SESSION['carrinho']);
    redirecionar("compras/listar");
}

function removerProduto($id) {
    $produtos = $_SESSION['carrinho'];
    unset($produtos[$id]);
    $_SESSION["carrinho"] = $produtos;
    redirecionar("compras/listar");
}

?>