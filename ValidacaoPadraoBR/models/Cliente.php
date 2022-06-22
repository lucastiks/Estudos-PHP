<?php

class Cliente
{

    var $nome;
    var $cpf_cnpj;
    var $telefone;
    var $email;
    var $cep;
    var $endereco;
    var $bairro;
    var $numero;
    var $cidade;
    var $uf;


    function __construct($nome, $cpf_cnpj, $telefone, $email, $cep, $endereco, $bairro, $numero, $cidade, $uf)
    {
        $this->nome = $nome;
        $this->cpf_cnpj = $cpf_cnpj;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->uf = $uf;

        if (!$this->validaCep($cep)) throw new Exception("CEP no formato inválido!");
        if(!$this->validaTelefone($telefone)) throw new Exception("Telefone no formato inválido!");
        if(!$this->validaEmail($email)) throw new Exception("Email no formato inválido!");
    }

    function validaCep($cep)
    {
        if (strlen($cep) == 10) {
            //22.333-333
            $regex_cep = "/^[0-9]{2}\.[0-9]{3}\-[0-9]{3}$/";
            return preg_match($regex_cep, $cep);
        } return false;
    }

    function validaTelefone($telefone)
    {
        if (strlen($telefone) == 15) {
            //(27) 99507-5649)
            $regex_telefone = "/^\([0-9]{2}\)\s[0-9]{5}\-[0-9]{4}$/";
            return preg_match($regex_telefone, $telefone);
        } return false;
    }

    function validaEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        } return false;
    }

}
