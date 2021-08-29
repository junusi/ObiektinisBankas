<?php

namespace Objectinis\Bankas;

use App\DB\DataBase;

class Json implements DataBase {

    private static $obj;
    private $data;

    public static function get()
    {
        return self::$obj ?? self::$obj = new self;
    }

    private function __construct()
    {
        if (!file_exists(DIR.'data/saskaita.json')) {
            file_put_contents(DIR.'data/saskaita.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(DIR.'data/saskaita.json'), 1);
    }

    public function __destruct()
    {
        file_put_contents(DIR.'data/saskaita.json', json_encode($this->data));
    }


    function create(array $saskaitaData) : void
    {
        $this->data[] = $saskaitaData;
    }
 
    function update(int $saskaitaId, array $saskaitaData) : void
    {
        foreach ($this->data as  $key => $saskaita) {
            if ($saskaita['id'] == $saskaitaId) {
                $this->data[$key] = $saskaitaData;
            }
           }
    }
  
  function updates(int $saskaitaId, array $saskaitaData) : void
    {
        foreach ($this->data as  $key => $saskaita) {
            if ($saskaita['id'] == $saskaitaId) {
                $this->data[$key] = $saskaitaData;
            }
           }
    }
 
 
    function delete(int $saskaitaId) : void
    {
        foreach ($this->data as  $key => $saskaita) {
            if ($saskaita['id'] == $saskaitaId && $saskaita['lesas'] == 0) {
                unset ($this->data[$key]);
               App::addMessage('succsess', 'Saskaita uždaryta'); 
            }else{
                App::addMessage('succsess', 'Sąskaita negali būti uždaryta ,joje yra lėšų');  
            }
           }
    }
 
    function show(int $saskaitaId) : array
    {
        foreach ($this->data as $saskaita) {
         if ($saskaita['id'] == $saskaitaId) {
           return $saskaita;
         }
       }
       return [];
    }
    
    function showAll() : array
    {
        return $this->data;
    }


}











