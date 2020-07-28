<?php
session_start();
include('../db/conexao.php');

if (isset($_POST["add"])) {
    if (isset($_SESSION["carrinho"])) {
        $arrayProdutoId = array_column($_SESSION["carrinho"], "id_prod");
        if (!in_array($_GET["id_produto"], $arrayProdutoId)) {
            $count = count($_SESSION["carrinho"]);
            $arrayProduto = array(
                'id_prod'         => $_GET["id_produto"],
                'nome_produto'    => $_POST["nomeSalvo"],
                'valor_produto'   => $_POST["valorSalvo"],
                'qtd_produto'     => $_POST["quantidade"],
                'imposto'         => $_POST["impostoSalvo"],
                'categoria'       => $_POST["categoriaSalvo"]
            );
            $_SESSION["carrinho"][$count] = $arrayProduto;
            echo '<script>window.location="../venda/tela-venda.php"</script>';
        } else {
            echo '<script>alert("Produto já adicionado")</script>';
            echo '<script>window.location="../venda/tela-venda.php"</script>';
        }
    } else {
        $arrayProduto = array(
            "id_prod"         => $_GET['id_produto'],
            "nome_produto"    => $_POST['nomeSalvo'],
            "valor_produto"   => $_POST['valorSalvo'],
            "qtd_produto"     => $_POST['quantidade'],
            'imposto'         => $_POST["impostoSalvo"],
            'categoria'        => $_POST["categoriaSalvo"]
        );
        $_SESSION["carrinho"][0] = $arrayProduto;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["carrinho"] as $keys => $valor) {
            if ($valor["id_prod"] == $_GET["id_produto"]) {
                unset($_SESSION["carrinho"][$keys]);
                echo '<script>alert("Produto removido")</script>';
                echo '<script>window.location="../venda/tela-venda.php"</script>';
            }
        }
    }
}
