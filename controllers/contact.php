<?php
$heading="contact";
function urlIs($value){
    return $_SERVER['REQUEST_URI']===$value;
}

require "views/contact.view.php";
