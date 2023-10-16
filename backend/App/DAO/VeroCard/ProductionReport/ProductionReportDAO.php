<?php

namespace App\DAO\VeroCard\ProductionReport;

use App\DAO\VeroCard\Connection;
use App\Models\ProductionReportModel;

class ProductionReportDAO extends Connection
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getProductionReportFilterFileTarjaDAO(ProductionReportModel $productionReportModel): array
    {

        $statement = $this->pdo->prepare("SELECT * from view_romcard_producao_tarja WHERE nome_arquivo_proc = :arquivo");

        $statement->execute(['arquivo' => $productionReportModel->getFile()]);

        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }

    public function getProductionReportFilterDateTarjaDAO(ProductionReportModel $productionReportModel): array
    {

        $statement = $this->pdo->prepare("SELECT * from view_romcard_producao_tarja WHERE  dt_processamento BETWEEN :datainicial AND :datafinal ;");

        $statement->execute(['datainicial' => $productionReportModel->getInitialProcessinDate(), 'datafinal' => $productionReportModel->getFinalProcessinDate()]);

        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }

    public function getProductionReportFilterShippingTarjaDAO(ProductionReportModel $productionReportModel): array
    {
        $statement = $this->pdo->prepare("SELECT * from view_romcard_producao_tarja WHERE dt_expedicao BETWEEN :expedicaoinicial AND :expedicaofinal ;");

        $statement->execute(['expedicaoinicial' => $productionReportModel->getInitialShippingdate(), 'expedicaofinal' => $productionReportModel->getFinalShippingdate()]);

        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }


    public function getProductionReportFilterDatesInGeneralTarjaDAO(ProductionReportModel $productionReportModel): array
    {
        $statement = $this->pdo->prepare("SELECT * from view_romcard_producao_tarja WHERE dt_expedicao BETWEEN :expedicaoinicial AND :expedicaofinal OR dt_processamento BETWEEN :datainicial AND :datafinal;");

        $statement->execute(['expedicaoinicial' => $productionReportModel->getInitialShippingdate(), 'expedicaofinal' => $productionReportModel->getFinalShippingdate(), 'datainicial' => $productionReportModel->getInitialProcessinDate(), 'datafinal' => $productionReportModel->getFinalProcessinDate()]);

        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }


    public function getProductionReportFilterFileChipDAO(ProductionReportModel $productionReportModel): array
    {

        $statement = $this->pdo->prepare("SELECT * from view_romcard_producao_chip WHERE nome_arquivo_proc = :arquivo");

        $statement->execute(['arquivo' => $productionReportModel->getFile()]);

        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }

    public function getProductionReportFilterDateChipDAO(ProductionReportModel $productionReportModel): array
    {

        $statement = $this->pdo->prepare("SELECT * from view_romcard_producao_chip WHERE dt_processamento BETWEEN :datainicial AND :datafinal ;");

        $statement->execute(['datainicial' => $productionReportModel->getInitialProcessinDate(), 'datafinal' => $productionReportModel->getFinalProcessinDate()]);

        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }

    public function getProductionReportFilterShippingChipDAO(ProductionReportModel $productionReportModel): array
    {
        $statement = $this->pdo->prepare("SELECT * from view_romcard_producao_chip WHERE dt_expedicao BETWEEN :expedicaoinicial AND :expedicaofinal ;");

        $statement->execute(['expedicaoinicial' => $productionReportModel->getInitialShippingdate(), 'expedicaofinal' => $productionReportModel->getFinalShippingdate()]);

        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }


    public function getProductionReportFilterDatesInGeneralChipDAO(ProductionReportModel $productionReportModel): array
    {
        $statement = $this->pdo->prepare("SELECT * from view_romcard_producao_chip WHERE dt_expedicao BETWEEN :expedicaoinicial AND :expedicaofinal OR dt_processamento BETWEEN :datainicial AND :datafinal;");

        $statement->execute(['expedicaoinicial' => $productionReportModel->getInitialShippingdate(), 'expedicaofinal' => $productionReportModel->getFinalShippingdate(), 'datainicial' => $productionReportModel->getInitialProcessinDate(), 'datafinal' => $productionReportModel->getFinalProcessinDate()]);

        $response = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }
}
