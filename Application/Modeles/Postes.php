<?php

namespace Application\Modeles; 
use \Noyau\Modele; 
use \PDO;
use \PDOException;

class Postes extends Modele
{
    public static function getPostes(){
        try{
            $php_connecte_a_mysql = self::getConnexionEntrePhpEtMysql();
            $instruction_mysql = $php_connecte_a_mysql->query("SELECT id, titre, contenu FROM postes ORDER BY created_at");
            
            $postes = $instruction_mysql->fetchAll(PDO::FETCH_ASSOC);
            
            return $postes;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}