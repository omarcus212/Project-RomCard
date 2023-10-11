import React from "react";
import Icon from "../../shared/Icon";
import Button from "../../shared/Button";

interface IDownloadFacilitators {
    printClick?: any
    csvClick?: any
    excelClick?: any
    refExcel?:any
    wordClick?: any
    textButton : string
    onClickButton?: any
    
}


const DownloadFacilitators: React.FC<IDownloadFacilitators> = ({ printClick, csvClick, excelClick, wordClick, onClickButton, textButton}) => {

    return (

        <div className="container-download-facilitators-search">

            <Button text={textButton} onClick={onClickButton} />

            <div className="download-facilitators">
                <div className="container-icon" onClick={csvClick}><img src="https://firebasestorage.googleapis.com/v0/b/verocard-ef4c6.appspot.com/o/csv_filetype_icon_227881%201.svg?alt=media&token=1b35ca77-e3c1-4da1-9fdd-47b3fee0addb&_gl=1*9f94zg*_ga*MTI5Nzg2NzE1OC4xNjk1NjQxNjM2*_ga_CW55HF8NVT*MTY5Njk2MTE2MS43LjEuMTY5Njk2MTI5My41NC4wLjA." alt="" /></div>
            </div>

        </div>


    )
}

export default DownloadFacilitators