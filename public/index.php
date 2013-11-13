<?php

use Symfony\Component\Debug\Debug;

$dirname = dirname(__DIR__);

require_once $dirname . '/vendor/autoload.php';

Debug::enable();

$file = filter_input(INPUT_GET, 'banco');
$file = $file ? $file : 'bb';

$loader = new \Twig_Loader_Filesystem(array(
    $dirname . '/Resources/views'
        ));

$options = array(
    'cache_dir' => ''
);

$twig = new \Twig_Environment($loader, $options);
$twig->getExtension('core')->setNumberFormat(2, ',', '.');


$pf = new \Umbrella\Ya\Boleto\PessoaFisica("Sacado 01", "09007668404");
$sacado = new \Umbrella\Ya\Boleto\Sacado($pf);
$cedente = new \Umbrella\Ya\Boleto\Cedente("Cendente 01", "92.559.708/0001-03");


require $file . '.php';




