<?php

class Navegacao {

    // Variável singleton
    private static $instance = NULL;

    // Singleton
    public static function getInstance() {
        if (is_null(self::$instance) || empty(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

// exibe o menu na página principal do site
    public function menuHome() {
        $con = Conexao::getInstance();
        $sql = 'SELECT * FROM categorias ORDER BY slug ASC';
        $exe = $con->mq($sql);

        $cat = array();
        $sub = array();

        if ($con->mnr($exe)) {
            while ($obj = $con->mfo($exe)) {
                $cat[$obj->id] = $obj->cat;
                $sub[$obj->id] = $obj->sub;
            }
        }


        foreach ($cat as $cc => $cv) {
            print '<ul>';
            if ($sub[$cc] == 0) {
                print '<li>' . $cat[$cc];

                $sub1 = ''; // adiciona as subcategorias na variavel
// nivel 1
                foreach ($sub as $sc => $sv) {
                    if ($sub[$sc] == $cc) {
                        $sub1 .= '<li>' . $cat[$sc];


                        $sub2 = ''; // adiciona as subcategorias na variavel
// nivel 2
                        foreach ($sub as $sc => $sv) {
                            if ($sub[$sc] == $cc) {
                                $sub2 .= '<li>' . $cat[$sc];
                                $sub2 .= '</li>';
                            }
                        }

                        // adiciona o segundo nivel ao menu
                        if (!empty($sub2)) {
                            $sub1 .= '<ul>';
                            $sub1 .= $sub2;
                            $sub1 .= '</ul>';
                        }

                        $sub1 .= '</li>';
                    }
                }

                if (!empty($sub)) {
                    print '<ul>';
                    print $sub1;
                    print '</ul>';
                }


                print '</li>';
            }
            print '</ul>';
        }
    }

}
