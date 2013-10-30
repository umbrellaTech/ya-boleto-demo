<?php

use Symfony\Component\Debug\Debug;

require_once __DIR__ . '/vendor/autoload.php';

Debug::enable();

$banco = new \Umbrella\YA\Boleto\Banco\BancoBrasil("5579-0", "00000-0");
$convenio = new \Umbrella\YA\Boleto\Convenio($banco, 18, "000000000", "2569589685");

$sacado = new \Umbrella\YA\Boleto\Sacado("Sacado 01", "12312312312");
$cedente = new \Umbrella\YA\Boleto\Cedente("Cendente 01", "2342342343");

$boleto = new \Umbrella\YA\Boleto\Boleto\BancoBrasil($sacado, $cedente, $convenio);

$view = new Umbrella\View\View($boleto);
echo $view->gerarBoleto(new Umbrella\View\Renderer\HtmlRenderer(), new \Umbrella\View\Formatter\PngExtension());
