<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Pessoa;

abstract class Funcionario extends Pessoa
{
    private float $salario;

    public function __construct(string $nome, CPF $cpf, float $salario)
    {
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    public function recebeAumento($valorAumento) : void
    {
        if($valorAumento < 0){
            echo "Valor do aumento deve ser positivo.";
            return;
        }
        $this->salario += $valorAumento;
    }

    public function recuperaSalario() : float
    {
        return $this->salario;
    }

    public function recuperaCargo(): string
    {
        return $this->cargo;
    }

    abstract public function calculaBonificacao() : float;

}