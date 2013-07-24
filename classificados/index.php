<?php
require_once 'includes/includes.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <title>Classificados do Cariri</title>
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
                    // vitrine
                    $vitrine = Vitrine::getInstance();
                    $vitrine->vitrineHome();
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
