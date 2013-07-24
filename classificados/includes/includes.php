<?php

// Inclui as classes utilizadas no sistema
function __autoload($c) {
    $f = 'includes/' . $c . '.php';
    $i = 0;
    require_once($f);
}

?>