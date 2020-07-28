<?php

include('../db/conexao.php');
if(empty(!$_POST)){

$nome = $_POST['nomeProduto'];
$valor = $_POST['valorProduto'];
$categoria = $_POST['categoriaProduto'];

$query = "INSERT INTO tb_produto (id_categoria, nome, valor) VALUES ('$categoria','$nome','$valor')";
$result = pg_query($query);
if ($result === FALSE) {
    echo '<script>alert("'.str_replace(array("\n", "\r"), '', addslashes(pg_last_error($db))).'")</script>';
} else {
    echo '<script>alert("Produto gravado com sucesso")</script>';
}

echo '<script>window.location="../cadastro/tela-cadastro-produto.php"</script>';
}
?> 