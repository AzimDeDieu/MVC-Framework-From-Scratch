<?php

namespace Application\Controleurs; 
use \Noyau\Controleur;

use \Noyau\Vue;

class Maison extends Controleur
{
    public function indexAction(){
        Vue::afficher("Maison/index.html");
    }
}