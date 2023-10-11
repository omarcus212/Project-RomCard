<?php

namespace App\DAO\VeroCard\AwaitingRelease;
use App\DAO\VeroCard\Connection;


class AwaitingReleaseDAO extends Connection{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllAwaitingReleaseChip() : array {

        $productsAwaitingRelease = $this -> pdo
            ->query(" SELECT * from view_romcard_producao_chip where dt_expedicao ISNULL 
            GROUP BY cod_produto,desc_produto,dt_processamento,dt_expedicao,nome_arquivo_proc,total_cartoes ;") 
            ->fetchAll(\PDO::FETCH_ASSOC);

            return $productsAwaitingRelease;

    }

    
    public function getAllAwaitingReleaseTarja() : array {

        $productsAwaitingRelease = $this -> pdo
            ->query(" SELECT * from view_romcard_producao_Tarja where dt_expedicao ISNULL 
            GROUP BY cod_produto,desc_produto,dt_processamento,dt_expedicao,nome_arquivo_proc,total_cartoes ;") 
            ->fetchAll(\PDO::FETCH_ASSOC);

            return $productsAwaitingRelease;

    }


}
