<?php 

namespace Noyau;
use \Exception;

class Routeur
{
    protected $routes = [];
    protected $parametre = [];

    public function getRoutes(){
        return $this->routes;
    }

    public function getParametre(){
        return $this->parametre;
    }

    public function conversionEnStudlyCaps($chaine){
        $chaine = str_replace("-", ' ', $chaine); 

        $chaine = ucwords($chaine);

        $chaine = str_replace(' ', "", $chaine);

        return $chaine;
    }
    public function conversionEnCamelCase($chaine){
        $chaine = $this->conversionEnStudlyCaps($chaine);

        $chaine = lcfirst($chaine);

        return $chaine;
    }
    public function polirUrl($url){
        if($url !== ""){
            $tableau = explode("&", $url, 2);
            if(strpos($tableau[0], "=") === false){
                $url = $tableau[0];
            }else{
                $url = "";
            }
        }
        return $url;
    }

    public function getNamespaceDuParametre(){
        $namespace = "Application\Controleurs\\";
        if(array_key_exists("namespace", $this->parametre)){
            $namespace .= $this->parametre['namespace'] . "\\";
        }
        return $namespace;
    } 

    public function ajouterRoute($route, $parametre = []){
        $route = preg_replace("/\//i", '\\/', $route);
        
        $route = preg_replace("/\{([a-z-]+)\}/i", '(?P<\1>[a-z-]+)', $route);

        $route = preg_replace("/\{([a-z]+):([^\}]+)\}/i", '(?P<\1>\2)', $route);
        
        $route = "/^$route$/"; 

        $this->routes[$route]=$parametre; 
        
        $this->parametre = $parametre;
    }

    public function extraireParametreDe($url_polie){
        foreach($this->routes as $route => $parametre){
            if(preg_match($route, $url_polie, $correspondances)){
                foreach($correspondances as $cle => $valeur){
                    if(is_string($cle)){
                        $this->parametre[$cle] = $valeur;
                    }
                } 
                return true;
            }
        }
        return false;
    }

    public function executerParametreDe($url){
        $url_polie = $this->polirUrl($url); 

        if($this->extraireParametreDe($url_polie)){
            $Controleur = $this->parametre['controleur'];

            $Controleur = $this->conversionEnStudlyCaps($Controleur);

            $Controleur = $this->getNamespaceDuParametre() . $Controleur;
            if(class_exists($Controleur)){
                $instance_controleur = new $Controleur($this->parametre);

                $action = $this->parametre['action'];

                $action = $this->conversionEnCamelCase($action);

                if(preg_match("/action$/i", $action) === 0){
                    $instance_controleur->$action();
                }else{
                    throw new Exception("methode $action inaccessible");
                }
            }else{
                throw new Exception("Controleur $Controleur introuvable");
            }
        }else{
            throw new Exception("Route inexistante pour cette url");
        }
    }

}