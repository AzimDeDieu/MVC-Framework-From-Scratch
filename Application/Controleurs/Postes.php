<?php

namespace Application\Controleurs;
use \Noyau\Controleur; 
use \Noyau\Vue;
use \Application\Modeles\ModelePostes;

class Postes extends Controleur
{
    public function indexAction(){
        $tableau = ModelePostes::getPostes(); 
        Vue::afficher("Postes/index.html", ['postes'=>$tableau]);
    }
}