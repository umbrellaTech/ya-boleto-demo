<?php

use Carbon\Carbon;

use Umbrella\YaBoleto\Bancos\Bradesco\Boleto\Bradesco as BoletoBradesco;
use Umbrella\YaBoleto\Bancos\Bradesco\Carteira\Carteira06;
use Umbrella\YaBoleto\Bancos\Bradesco\Convenio;
use Umbrella\YaBoleto\Bancos\Bradesco\Bradesco;

use Umbrella\YaBoleto\View\Helper\BarcodeCss;

$banco = new Bradesco("0564", "0101888");

$carteira = new Carteira06();

$numeroConvenio = '0101888';
$nossoNumero    = '77000009017';
$convenio       = new Convenio($banco, $carteira, $numeroConvenio, $nossoNumero);

$boleto = new BoletoBradesco($sacado, $cedente, $convenio);
$boleto->setValorDocumento(50)
       ->setNumeroDocumento(2)
       ->setDataVencimento(Carbon::now()->addWeek())
       ->gerarCodigoBarraLinhaDigitavel();

echo $twig->render('Bradesco.html.twig', array(
    'model' => $boleto,
    'barcode' => new BarcodeCss()
));
