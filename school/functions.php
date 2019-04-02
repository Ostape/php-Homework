<?php
require_once 'wrapper.php';

function get_restaraunts() {
    $dbh = new Wrapper("localhost", "restaurants", "","root","utf8mb4");
    $result = array();
    $result = $dbh->getData("SELECT restaurants.restaurant_name FROM restaurants WHERE 1");
    return $result->fetchAll();
}

function render($tmp, $vars=array()) {
    if (file_exists("$tmp.php")){
        ob_start();
        extract($vars);
        require $tmp.'.php';
        return ob_get_clean();
    }
}
