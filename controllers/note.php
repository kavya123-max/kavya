<?php

require 'Database.php';

$heading = "note";
$config = require('config.php');  
$db = new Database($config['database']);

// Set the note ID (you can get this from $_GET or hardcode for testing)
$noteId = 2;

// Fetch the note directly
$note = $db->findOrFail('notes', $noteId);

if ($note['user'] != 1) {
    abort(Response::FORBIDDEN);
}

var_dump($note);

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

require "views/note.view.php";
