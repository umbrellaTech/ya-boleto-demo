<?php

use Umbrella\Ya\Boleto\Bancos\BancoBrasil\BancoBrasil as BancoBrasil2;
use Umbrella\Ya\Boleto\Bancos\BancoBrasil\Boleto\BancoBrasil;
use Umbrella\Ya\Boleto\Bancos\BancoBrasil\Carteira\Carteira18;
use Umbrella\Ya\Boleto\Bancos\BancoBrasil\Convenio;
use Umbrella\Ya\Boleto\View\Helper\BarcodeCss;

$banco = new BancoBrasil2("2332-9", "6166-2");
$carteira = new Carteira18("125");
$convenio = new Convenio($banco, $carteira, "1643044", "1234567");

$boletoBB = new BancoBrasil($sacado, $cedente, $convenio);
$boletoBB->setValorDocumento(187.25)
    ->setNumeroDocumento("125")
    ->setDataVencimento(new DateTime("2013-11-08"))
    ->setInstrucoes(array(
        'Instrucao 01',
        'Instrucao 02',
        'Instrucao 03'
    ))
    ->getLinhaDigitavel();

echo $twig->render('BancoBrasil.html.twig', array(
    'model' => $boletoBB,
    'barcode' => new BarcodeCss()
));
