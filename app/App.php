<?php
namespace Objectinis\Bankas;

use Objectinis\Bankas\Controller\SaskaitaController;

class App{

public static function start()
{
  self::router();
}

public static function router()
{
    $url = str_replace(INSTALL,'',$_SERVER['REQUEST_URI']);
    $url = explode('/',$url);
   if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && $url[0] == '') {
      return (new SaskaitaController)->home();
}
   if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && $url[0] == 'create') {
      return (new SaskaitaController)->create();
}
   if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && $url[0] == 'create') {
      return (new SaskaitaController)->save();
}
   if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && $url[0] == 'list') {
      return (new SaskaitaController)->index();
}

}

public static function view($name,$data =[])
{
    extract($data);
    require DIR . "view/$name.php";
}


public static function redirect($url)
{
    header('location:'.URL.$url);
    die;
}
























}




