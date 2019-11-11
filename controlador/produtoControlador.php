<?php

require_once "servico/uploadServico.php";
require_once "modelo/produtoModelo.php";
require_once "modelo/categoriaModelo.php";

/** admin */
function adicionar() {
    if (ehPost()) {
        $nome_do_produto = $_POST["nomeproduto"];
        $preco_do_produto = $_POST["preco"];
        $categoria = $_POST["descricao"];

        $imagem_tmp = $_FILES["imagem"]["tmp_name"];
        $name_img = $_FILES["imagem"]["name"];
        $imagem = uploadImagem($imagem_tmp, $name_img);
        
        $infoProduto = $_POST["descricao"];
        $estoque_minimo = $_POST["estoque_minimo"];
        $estoque_maximo = $_POST["estoque_maximo"];

        $msg = adicionarProduto($categoria, $nome_do_produto, $preco_do_produto, $imagem, $infoProduto, $estoque_minimo, $estoque_maximo);
        redirecionar("produto/listarProdutos");
    } else {
        $dados = array();
        $dados["categorias"] = pegarTodasCategorias();
        exibir("produtos/formulario", $dados);
    }
}

/** anon */
function listarProdutos() {
    $dados = array();
    $dados["produtos"] = pegarTodosProdutos();
    exibir("produtos/listar", $dados);
}

/** anon */
function ver($id) {
    $dados["produto"] = pegarProdutoPorId($id);
    exibir("produtos/visualizar", $dados);
}

/** admin */
function deletar($id) {
    deletarProduto($id);
    redirecionar("produto/listarProdutos");
}

/** anon */
function buscar($nome) {
    if (ehPost()) {
        $nome = $_POST['buscar'];
        $dados['categorias'] = pegarTodasCategorias();
        $dados['produtos'] = buscarProdutosPorNome($nome);
        exibir("produtos/listar", $dados);
    }
}

/** anon */
function buscarPorCategoria($idCategoria) {
    $dados['categorias'] = pegarTodasCategorias();
    $dados['produtos'] = buscarProdutoPorIDcategoria($idCategoria);
    exibir("produtos/listar", $dados);
}

/** admin */
function editar($id) {
    if (ehPost()) {
        $preco_do_produto = $_POST["preco"];
        $nome_do_produto = $_POST["nomeproduto"];
        $categoria = $_POST["categoria"];
        $infoProduto = $_POST["descricao"];
        $estoque_minimo = $_POST["estoque_minimo"];
        $estoque_maximo = $_POST["estoque_maximo"];


        $imagem_tmp = $_FILES["imagem"]["tmp_name"];
        $name_img = $_FILES["imagem"]["name"];
        $imagem = uploadImagem($imagem_tmp, $name_img);

        $msg = editarProduto($id, $categoria, $preco_do_produto, $nome_do_produto, $infoProduto, $imagem, $estoque_minimo, $estoque_maximo);
        redirecionar("produto/listarProdutos");
    } else {
        $dados["categorias"] = pegarTodasCategorias();
        $dados["produto"] = pegarProdutoPorId($id);
        exibir("produtos/formulario", $dados);
    }
}

?>