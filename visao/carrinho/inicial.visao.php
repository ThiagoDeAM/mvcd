<?php

if (isset($_SESSION["carrinho"])):
    $produtos = $_SESSION["carrinho"];
    foreach($produtos as $produto):
?>
    <div style="display: flex; flex-direction: row; width: 400px; justify-content: space-between">
        <p><?=$produto['nomeproduto']?></p>
        <p><?=$produto['preco']?></p>
        <a href="compras/removerProduto/<?=$produto['idproduto']?>">Remover Produto</a>
    </div>
<?php
    endforeach;
else:
    echo "Carrinho vazio";
endif;
