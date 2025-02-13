<?php
define("APP_ROOT", dirname(__FILE__, 2));

require APP_ROOT . '/config.php';
require APP_ROOT . '/src/functions.php';
require APP_ROOT . '/vendor/autoload.php';

$twig_options['cache'] = APP_ROOT . '/var/cache';
$twig_options['debug'] = DEV;

$loader = new \Twig\Loader\FilesystemLoader(APP_ROOT . '/templates');
$twig = new \Twig\Environment($loader, $twig_options);
$twig->addGlobal('doc_root', DOC_ROOT);
if (DEV == true) {
    $twig->addExtension(new \Twig\Extension\DebugExtension());
}