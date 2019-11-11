<form action="" method="POST">
    nome: <input type="text" name="nome" value="<?=@$usuario['nome']?>"><br>
    email: <input type="text" name="email" value="<?=@$usuario['email']?>"><br>
    senha: <input type="password" name="senha" value="<?=@$usuario['senha']?>"><br>
    papel: <input type="text" name="papel" value="<?=@$usuario['papel']?>"><br>
    <button type="submit">Enviar</button>
</form>