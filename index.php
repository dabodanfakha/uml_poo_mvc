<?php
//Chargement dynamique  des classes=> AutoLoading
define("BASE_URL","http://binome.alwaysdata.net");
require_once("./libs/Router.php");
$router=new Router();
$router->route();
?>
