import React, { useEffect, useState } from "react";
import DefaultHeader from "../../components/layout/DefaultHeader";
import Input from "../../components/shared/Input";
import DownloadFacilitators from "../../components/layout/DownloadFacilitators";
import Select from "../../components/shared/Select";
import api from "../../connectionAPI";
import Table from "../../components/shared/Table";
import Swal from "sweetalert2";


const PageStock: React.FC = () => {

    const [stockData, setStockData] = useState([]);

    const [formValues, setFormValues] = useState({

        fileName: "",
        product: "",
        productCode: ""

    });

    const handleChange = (e: any) => {
        setFormValues({
            ...formValues,
            [e.target.name]: e.target.value
        })
    }



    const ProductionReportRequests = async () => {

            await api.post('/stock', {
                desc_produto: formValues.product,
                cod_produto: formValues.productCode,
            }).then((data) => {
    
                setStockData(data.data)
    
            }).catch(() => {
                
            });

    }

    const columnsStock: Array<Object> = [
        {
            name: 'ID Produto',
            selector: (row: any) => row.id_produto
        },
        {
            name: 'Descrição do produto',
            selector: (row: any) => row.desc_produto,
            
        },
        {
            name: 'Saldo atual',
            selector: (row: any) => row.saldo_atual
        },
        {
            name: 'Código do produto',
            selector: (row: any) => row.cod_produto
        },
        {
            name: 'Média',
            selector: (row: any) => row.media
        }
    ];



    return (
        <>
            <DefaultHeader sessionTheme="Estoque" />
            <div className="container-stock">

                <div className="inputs-info-products">
                    <Input name="product" info="Descrição do produto:" placeholder="Produto..." onChange={handleChange} />
                    <Input name="productCode" info="Código do produto:" placeholder="Código produto..." onChange={handleChange} />
                </div>

                {
                    Array.isArray(stockData) && stockData.length >= 1  &&
                    <Table
                        data={stockData}
                        column={columnsStock}
                    />
                }

                <DownloadFacilitators  textButton={'Pesquisar'} onClickButton={() => ProductionReportRequests()} />

            </div>

        </>
    )

}

export default PageStock;