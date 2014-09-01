<?php

use Symfony\Component\Debug\Debug;
use Umbrella\Ya\Boleto\Cedente;
use Umbrella\Ya\Boleto\PessoaFisica;
use Umbrella\Ya\Boleto\Sacado;

$dirname = dirname(__DIR__);
require_once $dirname . '/../vendor/autoload.php';

Debug::enable();

$file = filter_input(INPUT_GET, 'banco');
$file = $file ? $file : 'bb';

$loader = new Twig_Loader_Filesystem(array(
    $dirname . '/../Resources/views'
    ));

$options = array(
    'cache_dir' => ''
);

$twig = new Twig_Environment($loader, $options);
$twig->getExtension('core')->setNumberFormat(2, ',', '.');

$pf = new PessoaFisica("Sacado 01", "09007668404");
$sacado = new Sacado($pf);
$cedente = new Cedente("Cendente 01", "92.559.708/0001-03");

require $file . '.php';




