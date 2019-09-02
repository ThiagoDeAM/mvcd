<?php

function conn() {
    $cnx = mysqli_connect("localhost", "root", "", "mvcd");
    if (!$cnx) die('Deu errado a conexao!');
    return $cnx;
}