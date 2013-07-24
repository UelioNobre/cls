<?php

// Conexao com servidor mysql
class Conexao {

    // variavel singleton
    private static $instance = NULL;
    private $host; // Nome do servidor mysql
    private $user; // Usuário
    private $pass; // Senha
    private $base; // Nome do banco de dados
    private $conn; // Variável que contém a conexão
    private $db; // Váriável que contem o banco de dados

    private function __construct() {

        // Definindo o endereço do servidor mysql
        $this->host = 'localhost';

        // Define o usuário do banco
        $this->user = 'root';

        // Define a senha do banco
        $this->pass = 'vertrigo';

        // Define o nome do banco
        $this->base = 'classificados_do_cariri';

        // Realiza conexao
        $this->setConn();

        // Seleciona e conecta com o banco
        $this->setDb();
    }

    // Singleton
    public static function getInstance() {
        if (is_null(self::$instance) || empty(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // Seta uma conexao
    private function setConn() {
        $this->conn = mysql_connect($this->host, $this->user, $this->pass);
    }

    // Retorna a conexao
    private function getConn() {
        return $this->conn;
    }

    // Seta o banco de dados a utilizar
    private function setDb() {
        $this->db = mysql_select_db($this->base, $this->getConn());
    }

    // Executa querys
    public function mq($sql) {
        return mysql_query($sql);
    }

    // Retorna os dados como objeto
    public function mfo($exe) {
        return mysql_fetch_object($exe);
    }

    // Retorna o numero de linhas
    public function mnr($exe) {
        return mysql_num_rows($exe);
    }

}

// Fim da classe