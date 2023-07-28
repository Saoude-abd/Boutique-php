<?php

 $pdo = new PDO('mysql:host=localhost;dbname=boutique-php', 'root', '', 
[PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING,
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);

// var_dump( $pdo);

//ouvertuure de session

session_start();

//----------------- definition des constantes-----------------------------

define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/php/boutique-php/') ;

// echo RACINE_SITE;
// echo __FILE__ . "<br>";

//2) const qui contient l'url absolue

define("URL", "http://localhost/php/boutique-php/");

//-----------------declaration de variable---------------

$content = ''; // donne des alertes

//inclusion de fonction

require_once("fonction.php");


