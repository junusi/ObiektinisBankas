<?php
namespace Objectinis\Bankas;

use Objectinis\Bankas\Controller\SaskaitaController;
use Objectinis\Bankas\Controller\LoginController;
use Objectinis\Bankas\Controller\HomeController;

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
      return (new HomeController)->home();
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
   if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && $url[0] == 'create') {
      return (new SaskaitaController)->save();
}
   if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && $url[0] == 'create') {
     return (new SaskaitaController)->save();
}
    
   
    $update =['add-lesas'];
   if ('POST' == $_SERVER['REQUEST_METHOD'] && 2 == count($url) && in_array ($url[0],$update)) {
     return (new SaskaitaController)->update($url[0],$url[1]);
}
    $updates =['rem-lesas'];
if ('POST' == $_SERVER['REQUEST_METHOD'] && 2 == count($url) && in_array ($url[0],$updates)) {
   return (new SaskaitaController)->updates($url[0],$url[1]);
} 

   if ('POST' == $_SERVER['REQUEST_METHOD'] && 2 == count($url) && 'delete' == $url[0]) {
     return (new SaskaitaController)->delete($url[1]);
}

   if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && $url[0] == 'login') {
     return (new LoginController)->showLogin();
}
   if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && $url[0] == 'login') {
     return (new LoginController)->login();
}
   if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'logout' === $url[0]) {
     return (new LoginController)->logout();
}
}


   public static function view($name,$data = [])
{
    extract($data);
    require DIR . "view/$name.php";
}


   public static function redirect($url)
{
    header('location:'.URL.$url);
    die;
}




public static function addMessage(string $type, string $msg) : void
{
       $_SESSION['msg'][] = ['type' => $type, 'msg' => $msg];
}

public static function clearMessages() : void
{
       $_SESSION['msg'] = [];
}
public static function showMessages() : void
    {
        $messages = $_SESSION['msg'];
        self::clearMessages();
        self::view('msg', ['messages' => $messages]);
    }


public static function isLogged()
{
    return isset($_SESSION['login']) && $_SESSION['login'] == 1;
}



















}




