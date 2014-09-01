<?php

use Symfony\Component\Debug\Debug;
use Umbrella\Ya\RetornoBoleto\ProcessFactory;
use Umbrella\Ya\RetornoBoleto\ProcessHandler;

$dirname = dirname(__DIR__);

require_once $dirname . '/../vendor/autoload.php';

Debug::enable();

// Utilizamos a factory para construir o objeto correto para um determinado arquivo de retorno
$cnab = ProcessFactory::getRetorno($dirname . '/../Resources/ret/150/RCB001454508201412843.ret');

// Passamos o objeto contruido para o handler
$processor = new ProcessHandler($cnab);

// Processamos o arquivo. Isso retornará um objeto parseado com todas as propriedades do arquvio.
$retorno = $processor->processar();
$loader = new Twig_Loader_Filesystem(array(
    $dirname . '/../Resources/views'
    ));

$options = array(
    'cache_dir' => ''
);

$twig = new Twig_Environment($loader, $options);
$twig->getExtension('core')->setNumberFormat(2, ',', '.');

echo $twig->render('retorno.html.twig', array(
    'model' => $retorno
));
