<?php

namespace Application\Controleurs; 
use \Noyau\Controleur;

use \Noyau\Vue;

class Maison extends Controleur
{
    public function indexAction(){
        echo "Maison  / index";
    }
}