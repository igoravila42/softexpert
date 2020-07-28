<?php
include('../php/venda.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de compras</title>
    <link rel="stylesheet" type="text/css" href="../css/style-tela-venda.css" />
    <script type="text/javascript" src="../js/funcoes.js"></script>

</head>

<body>
    <div class="busca">
        <h1 class="titulo" align="center">Lista de produtos</h1>
        <div>
            <table class="tabela">
                <colgroup>
                    <col style="width: 250px">
                    <col style="width: 30px">
                    <col style="width: 120px">
                    <col style="width: 140px">
                </colgroup>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th>Qtd</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div class="div">
            <table class="tabela">
                <colgroup>
                    <col style="width: 305px">
                    <col style="width: 20px">
                    <col style="width: 100px">
                    <col style="width: 0px">
                </colgroup>
                <?php
                $query = "SELECT tb_produto.*, tb_categoria.* FROM tb_produto, tb_categoria WHERE tb_produto.id_categoria = tb_categoria.id_categoria ORDER BY tb_produto.nome ASC";
                $result = pg_query($db, $query);
                if (pg_numrows($result) > 0); {
                    while ($linha = pg_fetch_array($result)) {
                ?>
                        <tr>
                            <form method="POST" action="tela-venda.php?action=add&id_produto=<?php echo $linha["id_produto"]; ?>">
                                <td><?php echo $linha["nome"]; ?></td>
                                <td><?php echo $linha["categoria"]; ?></td>
                                <td>R$<?php echo number_format($linha["valor"], 2, ',', '.'); ?></td>
                                <td><input class="qtd" type="number" name="quantidade" placeholder="0" required></td>
                                <input type="hidden" name="nomeSalvo" value="<?php echo $linha["nome"]; ?>" />
                                <input type="hidden" name="valorSalvo" value="<?php echo $linha["valor"]; ?>" />
                                <input type="hidden" name="impostoSalvo" value="<?php echo $linha["imposto"]; ?>" />
                                <input type="hidden" name="categoriaSalvo" value="<?php echo $linha["categoria"]; ?>" />
                                <td><button class="add" type="submit" name="add">Adc</button></td>
                            </form>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
        <button class="back" onclick="goBack()">Voltar</button>
    </div>
    <?php
    if (!empty($_SESSION["carrinho"])) {
    ?>
        <div class="lista">
            <h1 class="titulo" align="center">Detalhes da compra</h1>
            <div>
                <table class="tabela">
                    <colgroup>
                        <col style="width: 300px">
                        <col style="width: 0px">
                        <col style="width: 40px">
                        <col style="width: 80px">
                        <col style="width: 10px">
                        <col style="width: 80px">
                        <col style="width: 10px">
                        <col style="width: 100px">
                        <col style="width: 50px">
                    </colgroup>
                    <tr>
                        <th>Nome</th>
                        <th>Qtd</th>
                        <th></th>
                        <th>Valor Unitário</th>
                        <th></th>
                        <th>Valor total</th>
                        <th></th>
                        <th>Valor imposto</th>
                        <th></th>
                    </tr>
                </table>
            </div>
            <div class="div2">

                <table class="tabela">
                    <colgroup>
                        <col style="width: 400px">
                        <col style="width: 0px">
                        <col style="width: 20px">
                        <col style="width: 50px">
                        <col style="width: 10px">
                        <col style="width: 80px">
                        <col style="width: 10px">
                        <col style="width: 100px">
                        <col style="width: 50px">
                    </colgroup>
                    <?php
                    $total = 0;
                    $totalImposto = 0;
                    foreach ($_SESSION["carrinho"] as $key => $valor) {
                    ?>
                        <tr>
                            <td><?php echo $valor["nome_produto"]; ?></td>
                            <td><?php echo $valor["qtd_produto"]; ?></td>
                            <td></td>
                            <td>R$<?php echo number_format($valor["valor_produto"], 2, ',', '.'); ?></td>
                            <td></td>
                            <td>R$<?php echo number_format($valor["qtd_produto"] * $valor["valor_produto"], 2, ',', '.'); ?></td>
                            <td></td>
                            <td>R$<?php echo number_format(($valor["imposto"] / 100) * $valor["qtd_produto"] * $valor["valor_produto"], 2, ',', '.'); 
                                    ?></td>
                            <td><a href="tela-venda.php?action=delete&id_produto=<?php echo $valor["id_prod"]; ?>"><button class="add">Remover</button></a></td>
                        </tr>
                    <?php
                        $total = $total + ($valor["qtd_produto"] * $valor["valor_produto"]);
                        $totalImposto = $totalImposto + (($valor["imposto"] / 100) * $valor["qtd_produto"] * $valor["valor_produto"]);
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="carrinho">
            <h1 class="titulo" align="center">Carrinho</h1>
            <table class="tabela">
                <colgroup>
                    <col style="width: 650px">
                    <col style="width: 60px">
                    <col style="width: 80px">
                    <col style="width: 80px">
                </colgroup>
                <tbody>
                    <tr>
                        <td>Valor total da compra:</td>
                        <td></td>
                        <td>R$<?php echo number_format($total, 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Valor total de impostos:</td>
                        <td></td>
                        <td>R$<?php echo number_format($totalImposto, 2, ',', '.'); ?></td>
                    </tr>

                </tbody>
            </table>
        </div>
    <?php
    } else { ?>
        <div class="lista">
            <h1 class="titulo" align="center">Carrinho vazio</h1>
        </div>
    <?php
    }
    ?>
</body>

</html>