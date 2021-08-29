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
public function __construct()
{
if(!App::isLogged())
{
    App::redirect('login');
}

}

public function index()
{
  $summos = $this->get()->showAll();
    return App::view('pirmas',['summos' => $summos]);
}

public function create()
{
    return App::view('naujas');
}

public function save()
{
    $nr = rand(1000000000, 9999999999);
    $nauja = ['lesas' => 0, 'id' => $nr];
    $this->get()->create($nauja);
    App::addMessage('succsess', 'Saskaita sukurta');
    App::redirect('list');
}
public function update($action,$id)
{
    $saskaita = $this->get()->show($id);
         if ('add-lesas' == $action && (int)$_POST['count'] != 0) {
       $saskaita['lesas'] += (int)$_POST['count'];
       App::addMessage('succsess', 'Pridėta lėšų');
    }    
         $this->get()->update($id,$saskaita);
         App::redirect('list');
 }

 public function updates($action,$id)
 {
     $saskaita = $this->get()->show($id);
     if ('rem-lesas' == $action &&  ($saskaita['lesas'] - (int)$_POST['count']) >= 0 && (int)$_POST['count'] != 0 ) {
        $saskaita['lesas'] -= (int)$_POST['count'] ; 
        App::addMessage('succsess', 'Atskaičiuota lėšų');
    }else{
        $saskaita['lesas'] = $saskaita['lesas'] ; 
        App::addMessage('succsess','Sąskaitoje nepakanka lėšų operacijai atlikti');
    }    
          $this->get()->updates($id,$saskaita);
          App::redirect('list');
  }

public function delete($id)
{
  
       $this->get()->delete($id);
     
        App::redirect('list');
}

















}






