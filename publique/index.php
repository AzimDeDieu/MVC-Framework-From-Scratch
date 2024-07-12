<?php

require dirname(__DIR__) . "/vendor/autoload.php"; 
use Noyau\Routeur;


error_reporting(E_ALL);

set_error_handler("\Noyau\Erreur::changerErreurEnException");

set_exception_handler("\Noyau\Erreur::changerExceptionEnTemplate"); 

// echo 1/0;

$instance_routeur = new Routeur();
$instance_routeur->ajouterRoute("{controleur}/{action}");
$instance_routeur->ajouterRoute("", ['controleur'=>'Maison', 'action'=>'index']);
$instance_routeur->ajouterRoute("{controleur}/{id:\d+}/{action}");

$url = $_SERVER['QUERY_STRING'];

$instance_routeur->executerParametreDe($url);
