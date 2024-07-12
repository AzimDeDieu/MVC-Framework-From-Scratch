<?php

namespace Noyau;
use \Application\Configuration;

use \PDO;

abstract class Modele
{ 
    protected static function getConnexionEntrePhpEtMysql(){
        static $connexion_entre_php_et_mysql = null;
        if($connexion_entre_php_et_mysql === null){
            $source_de_la_base_de_donnees = "mysql:host=".Configuration::HOTE_OU_SE_TROUVE_MYSQL.";dbname=".Configuration::NOM_DE_LA_BASE_DE_DONNEES.";";

            $connexion_entre_php_et_mysql = new PDO($source_de_la_base_de_donnees, Configuration::NOM_D_UTILISATEUR_MYSQL, Configuration::MOT_DE_PASSE_MYSQL);

            $connexion_entre_php_et_mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        return $connexion_entre_php_et_mysql;
    }
}