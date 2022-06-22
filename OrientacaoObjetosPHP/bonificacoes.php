<?php

require_once 'autoload.php';

use Alura\Banco\Service\ControladorDeBonificacoes;
use Alura\Banco\Modelo\{CPF};
use Alura\Banco\Modelo\Funcionario\{Desenvolvedor, Diretor, EditorVideo, Gerente};

$umFuncionario = new Desenvolvedor('Lucas Nunes Santos',
    new CPF('123.456.789-19'),
    3500);

$umaFuncionaria = new Gerente('Tais Fraga',
    new CPF('321.654.987-20'),
    5000);

$umDiretor = new Diretor('Arthur Nunes',
    new CPF('546.213.879-28')
    ,7000);

$umEditor = new EditorVideo('Andrew Da Silva',
    new CPF('987.654.312-12'),
    2500);


$controlador = new ControladorDeBonificacoes();
$umFuncionario->sobeDeNivel();
$controlador->adicionaBonificacao($umFuncionario);
$controlador->adicionaBonificacao($umaFuncionaria);
$controlador->adicionaBonificacao($umDiretor);

echo $controlador->recuperaTotal();