<?php
include('../php/cadastro-categoria.php')
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de categoria</title>
    <link rel="stylesheet" type="text/css" href="../css/style-tela-cadastro.css" />
    <script type="text/javascript" src="../js/funcoes.js"></script>

</head>

<body>
    <div class="menu">
        <h1 class="titulo" align="center">Cadastro de categoria</h1>

        <form name="inserirCategoria" method="POST" action="../php/cadastro-categoria.php">
            <div>
                <input name="cadastrarCategoria" class="texto" type="text" placeholder="Digite a categoria" required />
                <input name="cadastrarImposto" class="texto" type="number" step="any" placeholder="Valor do imposto" required />
                <label class="texto" style="font-size: 12px;  font-family: Verdana;">%</label><br><br><br>

                <div>
                    <button class="back" onclick="goBack()">Voltar</button>

                    <button class="clean" type="reset">Limpar</button>

                    <button class="enter" type="submit">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
<?php
?>