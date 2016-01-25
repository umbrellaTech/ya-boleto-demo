<?php

use Carbon\Carbon;

use Umbrella\YaBoleto\Bancos\BancoBrasil\Boleto\BancoBrasil as BoletoBancoBrasil;
use Umbrella\YaBoleto\Bancos\BancoBrasil\Carteira\Carteira18;
use Umbrella\YaBoleto\Bancos\BancoBrasil\Convenio;
use Umbrella\YaBoleto\Bancos\BancoBrasil\BancoBrasil;
use Umbrella\YaBoleto\View\Helper\BarcodeCss;

$banco = new BancoBrasil("2332-9", "6166-2");

$carteira = new Carteira18();

$numeroConvenio = '1643044';
$nossoNumero    = '1234567';
$convenio       = new Convenio($banco, $carteira, $numeroConvenio, $nossoNumero);

$boleto = new BoletoBancoBrasil($sacado, $cedente, $convenio);
$boleto->setValorDocumento(187.25)
       ->setNumeroDocumento("125")
       ->setDataVencimento(Carbon::now()->addWeek())
       ->setInstrucoes(array(
            'Instrucao 01',
            'Instrucao 02',
            'Instrucao 03'
       ))
       ->gerarCodigoBarraLinhaDigitavel();

echo $twig->render('BancoBrasil.html.twig', array(
    'model'   => $boleto,
    'barcode' => new BarcodeCss()
));
