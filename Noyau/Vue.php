<?php

namespace Noyau;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class Vue
{ 
    public static function afficher($template, $donnees=[]){
        static $environnement_twig = null;
        if($environnement_twig === null){
            $repertoire_twig = new FilesystemLoader(dirname(__DIR__) . "/Application/Vue/");

            $environnement_twig = new Environment($repertoire_twig);
        }
        echo $environnement_twig->render($template, $donnees);
    }
}