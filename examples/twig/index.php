<?php

require __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ .'/templates');
$twig = new Twig_Environment($loader, array(
    'cache' => __DIR__ .'/cache',
));

echo $twig->render('index.html', [
    'name' => 'Suzan'
]);