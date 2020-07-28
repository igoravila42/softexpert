<?php
include('../db/conexao.php');
if(empty(!$_POST)){

$categoria = $_POST['cadastrarCategoria'];
$imposto = $_POST['cadastrarImposto'];

$query = "INSERT INTO tb_categoria (categoria,imposto) VALUES ('$categoria','$imposto')";
$result = @pg_query($query);
if ($result === FALSE) {
    echo '<script>alert("'.str_replace(array("\n", "\r"), '', addslashes(pg_last_error($db))).'")</script>';
} else {
    echo '<script>alert("Categoria gravada com sucesso")</script>';
}

echo '<script>window.location="../cadastro/tela-cadastro-categoria.php"</script>';
}
?>