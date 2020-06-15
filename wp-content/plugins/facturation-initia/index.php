<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once './Controller/Routeur.php';
$r = new Routeur();
$r->router();