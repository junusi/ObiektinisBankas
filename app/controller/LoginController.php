<?php
namespace Objectinis\Bankas\Controller;

use Objectinis\Bankas\App;
use Objectinis\Bankas\Login\Json;

class LoginController
{
    private $settings = 'Json';
   

    private function get()
    {
        $db = 'Objectinis\\Bankas\\Login\\'.$this->settings;
        return $db::get();
    }

    public function showLogin()
    {
        return App::view('login');
    }

    public function login()
    {
        $name = $_POST['name'] ?? ''; 
        $pass = md5($_POST['pass']) ?? '';
        $user = $this->get()->show($name);
        if (empty($user)) {
            App::addMessage('danger', 'Įveskite duomenis dar kartą ');
            App::redirect('login');
        }
        if ($user['pass'] == $pass) {
            $_SESSION['login'] = 1;
            $_SESSION['name'] = $user['name'];
            App::addMessage('success', 'Sėkmingai prisijungta');
            App::redirect('list');
        }
        App::addMessage('danger', 'Įveskite duomenis dar kartą');
        App::redirect('login');
    }

    public function logout()
    {
        unset($_SESSION['login'], $_SESSION['name']);
        App::addMessage('success', 'Sekmingai atsijungta');
        App::redirect('login');
    }
}















  