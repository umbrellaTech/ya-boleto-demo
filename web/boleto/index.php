<?php

use Symfony\Component\Debug\Debug;

use Umbrella\YaBoleto\Cedente;
use Umbrella\YaBoleto\PessoaFisica;
use Umbrella\YaBoleto\Sacado;

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

// sacado...
$nomeSacado      = "John Doe";
$documentoSacado = "090.076.684-04";
$enderecoSacado  = array(
    "logradouro" => "Setor de Clubes Esportivos Sul (SCES) - Trecho 2 - Conjunto 31 - Lotes 1A/1B",
    "cep"        => "70200-002",
    "cidade"     => "Brasília",
    "uf"         => "DF"
);

// cedente...
$nomeCedente      = "ACME Corporation Inc.";
$documentoCedente = "01.122.241/0001-76";
$enderecoCedente  = array(
    "logradouro" => "Setor de Clubes Esportivos Sul (SCES) - Trecho 2 - Conjunto 31 - Lotes 1A/1B",
    "cep"        => "70200-002",
    "cidade"     => "Brasília",
    "uf"         => "DF"
);

$pessoaFisica = new PessoaFisica($nomeSacado, $documentoSacado, $enderecoSacado);
$sacado       = new Sacado($pessoaFisica);
$cedente      = new Cedente($nomeCedente, $documentoCedente, $enderecoCedente);

require $file . '.php';
