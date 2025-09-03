<?php

require 'Database.php';

$heading = "My notes";
$config = require('config.php');  
$db = new Database($config['database']);
$notes = $db->query('SELECT * FROM notes where user=1')->fetchAll();

var_dump($notes);

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

require "views/notes.view.php";
