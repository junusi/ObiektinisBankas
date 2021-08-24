<?php
namespace Objectinis\Bankas\Controller;

use Objectinis\Bankas\App;
use Objectinis\Bankas\Json;
class SaskaitaController{


private $settings = 'Json';

private function get()
{
    $dt = 'Objectinis\\Bankas\\'.$this->settings;
    return $dt::get();
}
public function home()
{
    return App::view('home');
}

public function index()
{
  $bebrai = $this->get()->showAll();
    return App::view('pirmas',['bebrai' => $bebrai]);
}

public function create()
{
    return App::view('naujas');
}

public function save()
{
    $nr = rand(1000000000, 9999999999); 
    $nauja = ['juodieji' => 0, 'rudieji' => 0, 'id' => $nr];
    $this->get()->create($nauja);
    App::redirect('');
}














}






