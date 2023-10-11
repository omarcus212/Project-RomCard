<?php

namespace App\DAO\VeroCard\Stock;

use App\DAO\VeroCard\Connection;
use App\Models\StockModel;

class StockDAO extends Connection
{

    public function __construct()
    {
        parent::__construct();
    }

    public function FilterbyDescriptionProductsAndProductCode(StockModel $stockModel, string $desc_produto): array
    {

        $statement = $this->pdo
            ->prepare("SELECT * from view_romcard_estoque_media WHERE desc_produto ILIKE '%" . $desc_produto . "%' AND  cod_produto = :cod_produto;");

        $statement->execute(['cod_produto' => $stockModel->getCodProduto()]);

        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }


    public function FilterbyProductCode(StockModel $stockModel): array
    {

        $statement = $this->pdo
            ->prepare("SELECT * from view_romcard_estoque_media WHERE cod_produto = :cod_produto LIMIT 10;");

        $statement->execute(['cod_produto' => $stockModel->getCodProduto()]);

        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }


    public function FilterbyDescriptionProduto(StockModel $stockModel, string $desc_produto): array
    {
        $statement = $this->pdo
            ->prepare("SELECT * from view_romcard_estoque_media where desc_produto ILIKE '%" . $desc_produto . "%'");

        $statement->execute();
        
        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }



}

?>