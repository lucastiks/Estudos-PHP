<?php

use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

$umEndereco = new Endereco('Petropolis', 'bairro Qualquer', 'Minha rua', '71b');
$outroEndereco = new Endereco('Rio de Janeiro', 'Centro', 'Uma rua aí', '50');

echo $umEndereco->bairro;
exit();

