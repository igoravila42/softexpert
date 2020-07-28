<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de produtos</title>
    <link rel="stylesheet" type="text/css" href="../css/style-tela-cadastro.css" />
    <script type="text/javascript" src="../js/funcoes.js"></script>

</head>

<body>
    <div class="menu">
        <h1 class="titulo" align="center">Cadastro de produtos</h1>

        <form name="inserirProduto" method="POST" action="../php/cadastro-produto.php">
            <div style="margin-left: 15px;">
                <input class="texto"  name="nomeProduto" placeholder="Nome" required /><br><br>
                <label class="texto" style="font-size: 12px; margin-left: -40px; font-family: Verdana;">R$</label>
                <input class="texto" name="valorProduto" placeholder="Valor" type="number" onchange="decimal" min="0" step="0.01" required /><br><br>

                <select class="texto" name="categoriaProduto" id="categoria" placeholder="Digite a porcentagem" type="number" onchange="decimal" min="0" step="0.01" required>
                    <option value="" selected disabled>Selecione a categoria</option>
                    <?php
                    include('../db/conexao.php');
                    $query = "SELECT id_categoria, categoria FROM tb_categoria";
                    $result = pg_query($query);

                    while ($linha = pg_fetch_assoc($result)) {
                        ?>
                         <option value=<?php echo $linha["id_categoria"]; ?>>
                             <?php echo $linha["categoria"]; ?>
                         </option>
                     <?php
                        }
                        ?>

                </select>
                <div>
                    <button onclick="goBack()" class="back">Voltar</button>

                    <button class="clean" type="reset">Limpar</button>

                    <button class="enter" type="submit">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>