
<?php
$heading="home";
function urlIs($value){
    return $_SERVER['REQUEST_URI']===$value;
}
require "views/index.view.php";
