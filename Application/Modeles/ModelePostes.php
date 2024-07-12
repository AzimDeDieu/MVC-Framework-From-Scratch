<?php

namespace Application\Modeles; 
use \Noyau\Modele; 
use \PDO;
use \PDOException;

class ModelePostes extends Modele
{
    public static function getPostes(){
        try{
            $php_connecte_a_mysql = static::getConnexionEntrePhpEtMysql();
            $instruction_mysql = $php_connecte_a_mysql->query("SELECT id, titre, contenu FROM postes ORDER BY created_at");
            
            $postes = $instruction_mysql->fetchAll(PDO::FETCH_ASSOC);
            
            return $postes;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}