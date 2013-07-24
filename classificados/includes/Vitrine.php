<?php

// Classe provisória para exibição dos produtos
// Tão provisória que nem vou comentar toda
class Vitrine {

    private static $instance = NULL;

    public static function getInstance() {
        if (is_null(self::$instance) || empty(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function vitrineHome() {
        $sql = "SELECT * FROM produtos ORDER BY id DESC";
        $con = Conexao::getInstance();
        $exe = $con->mq($sql);
        $row = $con->mnr($exe);


        $id = array();
        $titulos = array();
        $descricao = array();
        $imagens = array();


        $colunas = Config::COLUNAS;
        $linhas = ceil($row / $colunas);

        if ($row) {
            while ($obj = $con->mfo($exe)) {
                $id[] = $obj->id;
                $titulos[] = utf8_encode($obj->titulo);
                $descricao[] = substr(utf8_encode(nl2br($obj->descricao)), 0, 60);
                $imagens[] = $obj->img_thumb;
            }
        }


        $inc = 0;
        // imprimindo dados
        for ($i = 0; $i < $linhas; $i++) {
            print '<div class="row">';
            for ($j = 0; $j < $colunas; $j++) {
                if (!empty($titulos[$inc])) {
                    print '<div class="span4">';
                    print '<a href="detalhes/' . $id[$inc] . '/" title="' . $titulos[$inc] . '">';
                    print '<img src="imagens/produtos/' . $imagens[$inc] . '" />';
                    print '<h2>' . $titulos[$inc] . '</h2>';
                    print '</a>';
                    print '</div>';
                    $inc++;
                }
            }
            print '</div>';
        }
    }

}