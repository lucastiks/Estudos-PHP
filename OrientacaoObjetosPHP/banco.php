<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\ContaCorrente;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Conta\Conta;

$enderecoLucas = new Endereco('Serra', 'Valparaíso', 'Santos Dumont', '10');

$lucas = (new Titular(new CPF('000.009.010-11'), 'Lucas Nunes Santos', $enderecoLucas));
$primeiraConta = new ContaCorrente($lucas);

$arthur = new Titular(new CPF('0001.002.003-04'), 'Arthur Nunes Santos', $enderecoLucas);
$segundaConta = new ContaCorrente($arthur);

$tatiana = new Titular(new CPF('005.006.007-08'), 'Tatiana', $enderecoLucas);
$terceiraConta = new ContaCorrente($tatiana);

//echo $lucas->recuperaNome() . PHP_EOL;
//echo $lucas->recuperaCPF() . PHP_EOL;
$primeiraConta->deposita(1000);

echo "O cpf de Lucas é ", $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;
echo $primeiraConta->recuperaNomeTitular();

echo Conta::recuperaNumeroDeContasCriadas() . PHP_EOL;

