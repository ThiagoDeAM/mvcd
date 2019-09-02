<?php

function adicionarProduto($categoria, $preco_do_produto, $nome_do_produto, $infoProduto, $estoque_minimo, $estoque_maximo) {
    $sql = "INSERT INTO produto(idproduto, idcategoria, preco, nomeproduto, descricao, estoque_minimo, estoque_maximo) VALUES(NULL,'$categoria','$preco_do_produto', '$nome_do_produto', '$infoProduto', '$estoque_minimo', '$estoque_maximo')";

    $resultado = mysqli_query($cnx = conn(), $sql);

    if (!$resultado) {
        die('Erro ao cadastrar produto<br>' . mysqli_error($cnx));
    }
    return 'Produto cadastrado com sucesso!';
}

function buscarProdutosPorNome($nome) {
    $sql = "SELECT * FROM produto WHERE nomeproduto LIKE '%$nome%'";
    $resultado = mysqli_query(conn(), $sql);
    $busca = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $busca[] = $linha;
    }
    return $busca;
}

function buscarProdutoPorIDcategoria($idcategoria) {
    $sql = "SELECT * FROM produto WHERE idcategoria = '$idcategoria'";
    $resultado = mysqli_query(conn(), $sql);
    $produtos = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produtos[] = $linha;
    }
    return $produtos;
}

function pegarTodosProdutos() {
    $sql = "SELECT * FROM produto";
    $resultado = mysqli_query(conn(), $sql);
    $produtos = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produtos[] = $linha;
    }
    return $produtos;
}

function PegarNomePrecoPorIdProduto($id) {
    $sql = "SELECT nomeproduto, preco FROM produto WHERE idproduto = '$id'";
    $resultado = mysqli_query(conn(), $sql);
    $produto = mysqli_fetch_assoc($resultado);
    return $produto;
}

function pegarProdutoPorId($id) {
    $sql = "SELECT * FROM produto WHERE idproduto = '$id'";
    $resultado = mysqli_query(conn(), $sql);
    $produto = mysqli_fetch_assoc($resultado);
    return $produto;
}

function deletarProduto($id) {
    $sql = "DELETE FROM produto WHERE idproduto = '$id'";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {
        die('Erro ao deletar produto' . mysqli_error($cnx));
    }
    return 'Produto deletado com sucesso!';
}

function editarProduto($id, $categoria, $preco_do_produto, $nome_do_produto, $infoProduto, $estoque_minimo, $estoque_maximo) {
    $sql = "UPDATE produto SET idcategoria = '$categoria', preco = '$preco_do_produto', nomeproduto =  '$nome_do_produto', descricao = '$infoProduto', estoque_minimo = '$estoque_minimo', estoque_maximo =  '$estoque_maximo' WHERE idproduto = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!resultado) {
        die('Erro ao alterar produto' . mysqli_error($cnx));
    }
    return 'Produto alterado com sucesso!';
}

?>