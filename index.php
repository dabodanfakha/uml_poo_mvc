<?php
//Chargement dynamique  des classes=> AutoLoading
define("BASE_URL","http://localhost:88/MesTravaux/live_poo");
require_once("./libs/Router.php");
$router=new Router();
$router->route();
?>
