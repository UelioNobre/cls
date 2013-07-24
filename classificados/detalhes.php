<?php
require_once 'includes/includes.php';

// setando o id do produto
if (array_key_exists('id', $_GET)) {
    $id = (int) substr($_GET['id'], 0, 5);
} else {
    $id = (int) 0;
}

// obtem produto
$produto = ProdutoDetalhes::getInstance();
$produto->getProduto($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="<?php print Config::BASE; ?>assets/css/bootstrap.css">
        <title><?php print $produto->getTitulo(); ?> - Classifícados do Cariri</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="span2">                    
                    <?php
                    // navegação
                    $navegacao = Navegacao::getInstance();
                    $navegacao->menuHome();
                    ?>
                </div>

                <div class="span10">

                    <?php
                    printf("<h1>%s</h1><p>%s</p><p>Valor R$ %d</p>", $produto->getTitulo(), $produto->getDescricao(), $produto->getValor());
                    ?>

                    <?php
                    // vitrine
                    $vitrine = Vitrine::getInstance();
                    $vitrine->vitrineHome();
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
