<?php

use Umbrella\YaBoleto\Bancos;
use Umbrella\YaBoleto\Builder\BoletoBuilder;
use Umbrella\YaBoleto\Endereco;
use Umbrella\YaBoleto\View\Helper\BarcodeCss;

$builder = new BoletoBuilder(Bancos::SANTANDER);

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
    ->banco("3857", "6188974")
    ->carteira("57")
    ->convenio("0033418619006188974", "")
    ->build(187.25, "2", new \DateTime("2013-11-08"));

$boleto->setLocalPagamento("Pagável em qualquer banco")
//        ->setDesconto(2.00)
//        ->setOutrasDeducoes(2.00)
//        ->setOutrosAcrescimos(20.00)
    ->setAceite("N")
    ->setQuantidade(1)
    ->setEspecie("Dinheiro")
    ->setNumeroDocumento("2")
    ->setDataVencimento(new \DateTime("2013-12-12"))
    ->setInstrucoes(array(
        'Instrucao 01 [vencimento]',
        'Instrucao 02',
        'Instrucao 03'
    ));

echo $twig->render('Real.html.twig', array(
    'model' => $boleto,
    'barcode' => new BarcodeCss()
));
