<?php
$heading="about";
function urlIs($value){
    return $_SERVER['REQUEST_URI']===$value;
}


require "views/about.view.php";
