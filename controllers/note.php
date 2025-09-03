<?php

require 'Database.php';

$heading = " note";
$config = require('config.php');  
$db = new Database($config['database']);

$note = $db->query('SELECT * FROM notes where id = :id',[
    
    'id' =>$_GET['id']
    ])->fetch();
if(! $note){
    abort();
}

if($note['user'] != 1){
    abort(response::FORBIDDEN);
}
var_dump($note);

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

require "views/note.view.php";
