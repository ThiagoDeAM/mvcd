<?php

require_once "modelo/usuarioModelo.php";

function index() {
    $dados["usuarios"] = pegarTodosUsuarios();
    exibir("usuario/listar", $dados);
}

function adicionar() {
    if (ehPost()) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $papel = $_POST["papel"];
        $msg = adicionarUsuario($nome, $email, $senha, $papel);
        redirecionar("usuario/index");
    } else {
        exibir("usuario/formulario");
    }
}

function deletar($id) {
    $msg = deletarUsuario($id);
    redirecionar("usuario/index");
}

function editar($id) {
    if (ehPost()) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $papel = $_POST["papel"];
        $msg = editarUsuario($id, $nome, $email, $senha, $papel);
        redirecionar("usuario/index");
    } else {
        $dados["usuario"] = pegarUsuarioPorId($id);
        exibir("usuario/formulario", $dados);
    }
}

function visualizar($id) {
    $dados["usuario"] = pegarUsuarioPorId($id);
    exibir("usuario/visualizar", $dados);
}
