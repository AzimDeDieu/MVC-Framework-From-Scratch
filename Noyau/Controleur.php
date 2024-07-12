<?php

namespace Noyau; 

use \Exception;

abstract class Controleur
{
    protected $parametre = [];

    public function __construct($parametre = []){
        $this->parametre = $parametre;
    }

    public function avant(){
        return true;
    } 

    public function apres(){
        return true;
    }

    public function __call($methode, $arguments){
        $methode .= "Action";
        if(method_exists($this, $methode)){
            if($this->avant() !== false){
                call_user_func_array([$this, $methode], $arguments);

                $this->apres();
            }
        }else{
            throw new Exception("Méthode $methode introuvable");
        }
    }
}