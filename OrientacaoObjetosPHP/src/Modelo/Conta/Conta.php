<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\CPF;

abstract class Conta
{
    private $titular;
    protected $saldo;
    private static $numeroDeContasCriadas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;
        self::$numeroDeContasCriadas++;
    }

    public function __destruct()
    {
        self::$numeroDeContasCriadas--;
    }

    public function saca(float $valorASacar) : void
    {
        $tarifaSaque = $valorASacar * $this->percentualTarifa();
        $valorSaque = $valorASacar + $tarifaSaque;
            if ($valorSaque > $this->saldo){
            echo "Saldo Insuficiente";
            return;
        }

        $this->saldo -= $valorSaque;
    }

    public function deposita(float $valorADepositar) : void
    {
        if($valorADepositar < 0) {
            echo "Valor precisa ser positivo!";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    public function recuperaCpfTitular() : string
    {
        return $this->titular->recuperaCpf();
    }

    public function recuperaNomeTitular() : string
    {
        return $this->titular->recuperaNome();
    }

    public static function recuperaNumeroDeContasCriadas(): int
    {
        return self::$numeroDeContasCriadas;
    }

    abstract protected function percentualTarifa() : float;
}
