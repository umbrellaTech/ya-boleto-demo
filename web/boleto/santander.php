<?php

use Carbon\Carbon;

use Umbrella\YaBoleto\Bancos\Santander\Boleto\Santander as BoletoSantander;
use Umbrella\YaBoleto\Bancos\Santander\Carteira\Carteira57;
use Umbrella\YaBoleto\Bancos\Santander\Convenio;
use Umbrella\YaBoleto\Bancos\Santander\Santander;
use Umbrella\YaBoleto\View\Helper\BarcodeCss;

$banco = new Santander("3857", "6188974");
$banco->setIos("0");

$carteira = new Carteira57("2");

$numeroConvenio = '0033418619006188974';
$nossoNumero    = '1234';
$convenio       = new Convenio($banco, $carteira, $numeroConvenio, $nossoNumero);

$boleto = new BoletoSantander($sacado, $cedente, $convenio);
$boleto->setLocalPagamento("Pagável em qualquer banco")
       ->setValorDocumento(1.00)
       ->setAceite("N")
       ->setQuantidade(1)
       ->setEspecie("Dinheiro")
       ->setNumeroDocumento("2")
       ->setDataVencimento(Carbon::now()->addWeek())
       ->setInstrucoes(array(
            'Instrucao 01 [vencimento]',
            'Instrucao 02',
            'Instrucao 03'
       ))
       ->gerarCodigoBarraLinhaDigitavel();

echo $twig->render('Santander.html.twig', array(
    'model' => $boleto,
    'barcode' => new BarcodeCss()
));
