<?php

use Umbrella\Ya\Boleto\Bancos\Santander\Boleto\Santander;
use Umbrella\Ya\Boleto\Bancos\Santander\Carteira\Carteira57;
use Umbrella\Ya\Boleto\Bancos\Santander\Convenio;
use Umbrella\Ya\Boleto\Bancos\Santander\Santander as Santander2;
use Umbrella\Ya\Boleto\View\Helper\BarcodeCss;

//3936813
$bancoSantander = new Santander2("3857", "6188974");
$bancoSantander->setIos("0");

$carteira102 = new Carteira57("2");
$convenioSantander = new Convenio($bancoSantander, $carteira102, "0033418619006188974", "");

$boletoSantander = new Santander($sacado, $cedente, $convenioSantander);
$boletoSantander
    ->setLocalPagamento("Pagável em qualquer banco")
    ->setValorDocumento(1.00)
//        ->setDesconto(2.00)
//        ->setOutrasDeducoes(2.00)
//        ->setOutrosAcrescimos(20.00)
    ->setAceite("N")
    ->setQuantidade(1)
    ->setEspecie("Dinheiro")
    ->setNumeroDocumento("2")
    ->setDataVencimento(new DateTime("2013-12-12"))
    ->setInstrucoes(array(
        'Instrucao 01 [vencimento]',
        'Instrucao 02',
        'Instrucao 03'
    ))
    ->getLinhaDigitavel();

echo $twig->render('Real.html.twig', array(
    'model' => $boletoSantander,
    'barcode' => new BarcodeCss()
));
