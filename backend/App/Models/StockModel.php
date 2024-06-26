<?php

namespace App\Models;

final class StockModel
{
    /**
     * @var string
     */
    private $desc_produto;
    /**
     * @var string
     */
    private $cod_produto;




    public function getDescProduto(): string
    {
        return $this -> desc_produto;
    }

    public function setDescProduto(string $desc_produto): StockModel
    {

        $this-> desc_produto = $desc_produto;

        return $this;
    }

    public function getCodProduto(): string
    {
        return $this -> cod_produto;
    }

    public function setCodProduto(string $cod_produto): StockModel
    {

        $this-> cod_produto = $cod_produto;

        return $this;
    }

    
}
