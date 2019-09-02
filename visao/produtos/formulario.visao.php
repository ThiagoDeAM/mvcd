<style type="text/css">
	.tabela{
		font-family: 'Verdana', 'Arial', 'Helvetica', sans-serif;
		font-size: 10px;
	}
</style>

<form action="" method="POST" enctype="multipart/form-data">
	<h1>Cadastro de Produto</h1><br>
	<label for="nomeproduto">Nome do Produto:</label><br>
	<input type="text" name="nomeproduto" style="width:250px" value="<?= @$produto['nomeproduto'] ?>"><br><br>

	<label for="preco">Preço do Produto:</label><br>
	<input type="text" name="preco" style="width:250px" value="<?= @$produto['preco'] ?>"><br><br>

	<label>Categoria:</label>
	<select name="categoria">
		<option value="default">Selecione uma categoria</option>
		<?php foreach ($categorias as $categoria): ?>
			<option value="<?= $categoria['idcategoria'] ?>"><?= $categoria['descricao'] ?></option>
		<?php endforeach; ?>
	</select>

	<br><br><label for="descricao">Informações do Produto:</label><br>
	<input type="text" name="descricao" style="width:250px" value="<?= @$produto['descricao'] ?>"><br><br>

	<label for="estoque_minimo">Estoque Mínimo:</label><br>
	<input type="number" name="estoque_minimo" value="<?= @$produto['estoque_minimo'] ?>"><br><br>

	<label for="estoque_maximo">Estoque Máximo:</label><br>
	<input type="number" name="estoque_maximo" value="<?= @$produto['estoque_maximo'] ?>"><br><br>

	<button type="submit">Enviar</button>

</form>