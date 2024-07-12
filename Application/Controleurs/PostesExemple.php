<?php

namespace Application\Controleurs;
use \Noyau\Controleur;

use \Noyau\Vue;

class PostesExemple extends Controleur
{
    public function indexAction(){
        echo "Postes - index";
    }
}