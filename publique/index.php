<?php

require dirname(__DIR__) . "/vendor/autoload.php"; 


error_reporting(E_ALL);

set_error_handler("\Noyau\Erreur::changerErreurEnException");

set_exception_handler("\Noyau\Erreur::changerExceptionEnTemplate"); 

// echo 1/0;