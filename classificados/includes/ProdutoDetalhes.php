<?php

/**
 * Classe responsável para exibir todos os detalhes do produtos
 * assim como o titulo na barra de título e outras coisas
 */
class ProdutoDetalhes {

    public static $instance = NULL;
    private $con = NULL;
    private $id;
    private $titulo;
    private $descricao;
    private $valor;

    private final function __construct() {
        $this->con = Conexao::getInstance();
    }

    public static function getInstance() {
        if (empty(self::$instance) || is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // Obtem o produto do banco de dados a partir do id
    public function getProduto($id = 0) {
        $sql = "SELECT * FROM produtos WHERE id = {$id} LIMIT 1";
        $exe = $this->con->mq($sql);
        $obj = $this->con->mfo($exe);

        $this->setId($obj->id);
        $this->setTitulo($obj->titulo);
        $this->setDescricao($obj->descricao);
        $this->setValor($obj->valor);
    }

    /** Seta o id do produto
     * @param $id (int)
     * @return void
     */
    private function setId($id) {
        $this->id = (int) $id;
    }

    /** Retorna o id do produto
     * @return Int
     */
    public function getId() {
        return $this->id;
    }

    /** Seta o titulo do produto
     * @param $titulo (string) - Titulo do produto
     * @return void
     */
    private function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    /** Retorna o titulo do produto
     * @return String
     */
    public function getTitulo() {
        return $this->titulo;
    }

    /** Seta a descrição do produto
     * @param $descricao (string)
     * @return void
     */
    private function setDescricao($descricao) {
        $this->descricao = (string) $descricao;
    }

    /** Retorna a descricao do produto
     * @return String
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /** Seta o valor do produto
     * @param $valor (double)
     * @return void
     */
    private function setValor($valor) {
        $this->valor = (double) $valor;
    }

    /** Retorna o valor do produto
     * @return double
     */
    public function getValor() {
        return $this->valor;
    }

}