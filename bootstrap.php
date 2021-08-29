<?php

session_start();

define('INSTALL','/ObiektinisBankas/public/');
define('DIR',__DIR__.'/');
define('URL','http://localhost:8080/ObiektinisBankas/public/');

require DIR.'vendor/autoload.php';


        function showMessages()
{
    return Objectinis\Bankas\App::showMessages();
}
function isLogged() 
{
    return Objectinis\Bankas\App::isLogged();
}



