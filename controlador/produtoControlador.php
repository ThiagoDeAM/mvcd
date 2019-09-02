<?php

require_once "servico/uploadServico.php";
require_once "modelo/produtoModelo.php";
require_once "modelo/categoriaModelo.php";

function adicionar() {
    if (ehPost()) {
        $preco_do_produto = $_POST["preco"];
        $nome_do_produto = $_POST["nomeproduto"];
        $categoria = $_POST["categoria"];
        $infoProduto = $_POST["descricao"];
        $estoque_minimo = $_POST["estoque_minimo"];
        $estoque_maximo = $_POST["estoque_maximo"];

        $msg = adicionarProduto($categoria, $preco_do_produto, $nome_do_produto, $infoProduto, $estoque_minimo, $estoque_maximo);
        redirecionar("produto/listarProdutos");
    } else {
        $dados = array();
        $dados["categorias"] = pegarTodasCategorias();
        exibir("produtos/formulario", $dados);
    }
}

function listarProdutos() {
    $dados = array();
    $dados["produtos"] = pegarTodosProdutos();
    exibir("produtos/listar", $dados);
}

function ver($id) {
    $dados["produto"] = pegarProdutoPorId($id);
    exibir("produtos/visualizar", $dados);
}

function deletar($id) {
    deletarProduto($id);
    redirecionar("produto/listarProdutos");
}

function buscar($nome) {
    if (ehPost()) {
        $nome = $_POST['buscar'];
        $dados['categorias'] = pegarTodasCategorias();
        $dados['produtos'] = buscarProdutosPorNome($nome);
        exibir("produtos/listar", $dados);
    }
}

function buscarPorCategoria($idCategoria) {
    $dados['categorias'] = pegarTodasCategorias();
    $dados['produtos'] = buscarProdutoPorIDcategoria($idCategoria);
    exibir("produtos/listar", $dados);
}

function editar($id) {
    if (ehPost()) {
        $preco_do_produto = $_POST["preco"];
        $nome_do_produto = $_POST["nomeproduto"];
        $categoria = $_POST["categoria"];
        $infoProduto = $_POST["descricao"];
        $estoque_minimo = $_POST["estoque_minimo"];
        $estoque_maximo = $_POST["estoque_maximo"];

        $msg = editarProduto($id, $categoria, $preco_do_produto, $nome_do_produto, $infoProduto, $estoque_minimo, $estoque_maximo);
        redirecionar("produto/listarProdutos");
    } else {
        $dados["categorias"] = pegarTodasCategorias();
        $dados["produto"] = pegarProdutoPorId($id);
        exibir("produtos/formulario", $dados);
    }
}

?>