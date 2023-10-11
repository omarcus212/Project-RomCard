<?php

namespace App\DAO\VeroCard\AwaitingRelease;
use App\DAO\VeroCard\Connection;


class AwaitingReleaseDAO extends Connection{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllAwaitingRelease() : array {

        $productsAwaitingRelease = $this -> pdo
            ->query("SELECT * from view_romcard_producao_chip where dt_expedicao ISNULL;") 
            ->fetchAll(\PDO::FETCH_ASSOC);

            return $productsAwaitingRelease;

    }


}
