<h2>Listar Produtos</h2><br>

<table class="table" border="1">
    <thead>
        <tr>
            <th>Imagem</th>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Informações</th>
            <th>Estoque Mínimo</th>
            <th>Estoque Máximo</th>
            <th>VER</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
        </tr>
    </thead>
    <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><img src="<?= $produto['imagem'] ?>" style="heigth: 100px; width: 100px;"></td>
            <td><?= $produto['idproduto'] ?></td>
            <td><?= $produto['nomeproduto'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= substr($produto['descricao'], 0, 30) . "..." ?></td>
            <td><?= $produto['estoque_minimo'] ?></td>
            <td><?= $produto['estoque_maximo'] ?></td>
            <td><a href="produto/ver/<?= $produto['idproduto'] ?>" style="color: #000000;">Ver detalhes</a></td>
            <td><a href="produto/editar/<?= $produto['idproduto'] ?>" style="color: #000000;">Editar</a></td>
            <td><a href="produto/deletar/<?= $produto['idproduto'] ?>" style="color: #000000;">Deletar</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<br><br>

<a href="produto/adicionar" class="btn btn-primary" style="color:black;text-decoration: underline;">Novo Produto</a>