<?php

use Alura\Banco\Modelo\Conta\{ContaPoupanca, ContaCorrente, Titular};
use Alura\Banco\Modelo\{CPF, Endereco};

require_once 'autoload.php';

$conta = new ContaCorrente(
    new Titular(
        new CPF('123.099.127-19'),
        'Lucas Nunes Santos',
        new Endereco('Serra', 'Valparaíso','Santos Dumont', '10')
    )
);

$conta2 = new ContaCorrente(new Titular(new CPF('206.617.517-08'), 'Arthur Nunes Santos', new Endereco('Serra', 'Valparaíso', 'Santos Dumont', '10')));

$conta->deposita(500);
$conta->transfere(200, $conta2);
$conta->saca(100);
echo $conta2->recuperaSaldo();
echo $conta->recuperaSaldo();