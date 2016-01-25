<?php

use Symfony\Component\Debug\Debug;

$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

require_once __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Sao_Paulo');

Debug::enable();

$file = filter_input(INPUT_GET, 'banco');
$file = $file ? $file : 'bb';

$loader = new Twig_Loader_Filesystem(array(
    __DIR__ . '/../Resources/views'
));

$options = array(
    'cache_dir' => ''
);

$twig = new Twig_Environment($loader, $options);
$twig->getExtension('core')->setNumberFormat(2, ',', '.');

require __DIR__ . '/boleto/' . $file . '.php';
