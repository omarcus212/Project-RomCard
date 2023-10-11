import React, { useEffect, useState } from "react";
import api from "../../connectionAPI";
import Table from "../../components/shared/Table";
import DefaultHeader from "../../components/layout/DefaultHeader";
import Select from "../../components/shared/Select";


const PageHome: React.FC = () => {

    const [inProductionData, setInProductionData] = useState([]);
    const [awaitingReleaseData, setAwaitingRelease] = useState([]);
    const [typeMessageInProduction, setTypeMessageInProduction] = useState(false);
    const [typeMessageAwaitingRelease, setTypeMessageAwaitingRelease] = useState(false);
    const [formValues, setFormValues] = useState({Type: "tarja"})

const handleChange = (e: any) => {
        setFormValues({
            ...formValues,
            [e.target.name]: e.target.value
        })
    }


    const columnsInProduction: Array<Object> = [
        {
            name: 'Codigo do produto',
            selector: (row: any) => row.cod_produto,
            sortable: true
        },
        {
            name: 'Nome do arquivo',
            selector: (row: any) => row.nome_arquivo_proc,

        },
        {
            name: 'Desc do Produto',
            selector: (row: any) => row.desc_produto,


        },
        {
            name: 'Data Pros',
            selector: (row: any) => row.dt_processamento

        },
        {
            name: 'Data op',
            selector: (row: any) => row.dt_expedicao

        },
        {
            name: 'Quantidade de cartões',
            selector: (row: any) => row.total_cartoes,
            sortable: true
        },
    ];
    
    const columnsAwaitingRelease: Array<Object> = [
        {
            name: 'Ordem de produção',
            selector: (row: any) => row.id_ordem_producao_status,
            sortable: true
        },
        {
            name: 'Id op',
            selector: (row: any) => row.id_op

        },
        {
            name: 'Data de entrada',
            selector: (row: any) => row.dt_status
        },
        {
            name: 'Data de liberação',
            selector: (row: any) => row.dt_finalizado
        }
    ];

    useEffect(() => {

        const HomePageRequests = async () => {

            await api.post('/production',{tipo : formValues.Type})
                .then((data) => {
                    console.log(data.data)
                    setInProductionData(data.data)
                }).catch(() => {
                    setTypeMessageInProduction(true)
                });

            await api.get('/awaiting-release')
                .then((data) => {                          
                    setAwaitingRelease(data.data)
                }).catch(() => {
                    setTypeMessageAwaitingRelease(true)
                });
        }

       HomePageRequests()

    }, [formValues]);

    return (
        <div className="container-page-home">

            <DefaultHeader />

            <Select info={"Selecione o tipo de cartão:"} name="Type" onChange={handleChange}>

            <option value="tarja" selected>Tarja</option>

            <option value="chip">Chip</option>

            </Select>

            <Table
                data={Array.isArray(inProductionData)  ? inProductionData : [] }
                column={columnsInProduction}
                titleTable="Em produção"
                typeMessage={typeMessageInProduction}
                
                
            />

            <Table
                data={Array.isArray(awaitingReleaseData) ? awaitingReleaseData : []}
                column={columnsAwaitingRelease}
                titleTable="Aguardando liberação"
                typeMessage={typeMessageAwaitingRelease}
            />
        </div >
    )
}

export default PageHome;