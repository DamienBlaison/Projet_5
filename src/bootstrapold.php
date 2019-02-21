<?php
/**
 * Inclusion de la classe technique qui gère le chargement
 */
require_once __DIR__ . '/Kalaweit/Core/Autoloader.php';

/**
 * Nouvelle instance de la classe et on enregistre les namespaces principaux
 */
$loader = new \Kalaweit\Core\Autoloader();

$loader->addNamespace('\\Kalaweit', __DIR__ . '/Kalaweit');

$loader->register();
