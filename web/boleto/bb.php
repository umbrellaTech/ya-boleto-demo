<?php

use Umbrella\YaBoleto\Bancos;
use Umbrella\YaBoleto\Builder\BoletoBuilder;
use Umbrella\YaBoleto\Endereco;
use Umbrella\YaBoleto\View\Helper\BarcodeCss;

$builder = new BoletoBuilder(Bancos::BANCO_BRASIL);

// sacado...
$nomeSacado = "John Doe";
$documentoSacado = "090.076.684-04";
$enderecoSacado = new Endereco(
    "Setor de Clubes Esportivos Sul (SCES) - Trecho 2 - Conjunto 31 - Lotes 1A/1B",
    "70200-002",
    "Brasília",
    "DF"
);

// cedente...
$nomeCedente = "ACME Corporation Inc.";
$documentoCedente = "01.122.241/0001-76";
$enderecoCedente = new Endereco(
    "Setor de Clubes Esportivos Sul (SCES) - Trecho 2 - Conjunto 31 - Lotes 1A/1B",
    "70200-002",
    "Brasília",
    "DF"
);

$boleto = $builder->sacado(BoletoBuilder::PESSOA_FISICA, $nomeSacado, $documentoSacado, $enderecoSacado)
    ->cedente($nomeCedente, $documentoCedente, $enderecoCedente)
    ->banco("2332-9", "6166-2")
    ->carteira("18")
    ->convenio("1643044", "1234567")
    ->build(187.25, "125", new \DateTime("2013-11-08"));

$boleto->setInstrucoes(array(
    'Instrucao 01',
    'Instrucao 02',
    'Instrucao 03'
));

echo $twig->render('BancoBrasil.html.twig', array(
    'model' => $boleto,
    'barcode' => new BarcodeCss()
));
