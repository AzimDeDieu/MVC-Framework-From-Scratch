<?php

namespace Noyau;

use \Application\Configuration;

class Erreur
{
    public static function getInformation($exception){
        $classe = get_class($exception);
        $message = $exception->getMessage();
        $fichier = $exception->getFile();
        $ligne = $exception->getLine();

        $information = "
        ERREUR FATAL: <br>
            Fichier de provenance : $fichier <br>
            Ligne de provenance : $ligne <br>
            Message de l'exception : $message <br> 
            Classe de l'exception : $classe <br> 
        ";

        return $information;
    }
    public static function saveInformationDansFichier($exception){
        $information = self::getInformation($exception);

        $chemin = dirname(__DIR__) . "/journaux/" . date("Y-m-d");

        ini_set("error_log", $chemin);
        error_log(static::getInformation($exception));
    }
    public static function changerErreurEnException($severite, $message, $fichier, $ligne){
        $code_donne = 10;

        if(error_reporting() != 0){
            throw new \ErrorException($message, $code_donne, $message, $severite, $fichier, $ligne);
        }
    }

    public static function changerExceptionEnTemplate($exception){
        $code = $exception->getCode();
        if($code != 404){
            $code = 500;
        }

        http_response_code($code);
        
        if(Configuration::AFFICHER_VRAIS_INFOS_DES_ERREURS){
            echo self::getInformation($exception);
        }else{
            self::saveInformationDansFichier($exception);
        }
    }
}