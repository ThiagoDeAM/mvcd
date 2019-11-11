<?php

require_once "modelo/categoriaModelo.php";

/** admin */
function adicionar() {
    if (ehPost()) {
        $categoria = $_POST["descricao"];

        $msg = adicionarCategoria($categoria);
        redirecionar("categoria/listarCategoria");
    } else {
        exibir("categoria/formulario");
    }
}

/** admin */
function listarCategoria() {
    $dados = array();
    $dados["categorias"] = pegarTodasCategorias();
    exibir("categoria/listar", $dados);
}

/** admin */
function ver($id) {
    $dados["categoria"] = pegarCategoriaPorId($id);
    exibir("categoria/visualizar", $dados);
}

/** admin */
function deletar($id) {
    $msg = deletarCategoria($id);
    redirecionar("categoria/listarCategoria");
}

/** admin */
function editar($id) {
    if (ehPost()) {
        $categoria = $_POST["descricao"];

        editarCategoria($id, $categoria);
        redirecionar("categoria/listarCategoria");
    } else {
        $dados["categoria"] = pegarCategoriaPorId($id);
        exibir("categoria/formulario", $dados);
    }
}
?>

