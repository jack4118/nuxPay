<?php 

session_start();
include_once($_SERVER["DOCUMENT_ROOT"].'/include/PHPExcel.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/include/PHPExcel/Writer/Excel2007.php');

PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);

//Download the app Admin user list.
    if (isset($_POST['obj']) && !empty($_POST['obj'])) {
            $objPHPExcel = new PHPExcel(); 
            // Set the active Excel worksheet to sheet 0
            $objPHPExcel->setActiveSheetIndex(0);
            if(!$_POST['obj']) {
                // Set the Headers.
                $alpha = 'A';
                for ($i = 0; $i < 83; $i++) {
                    $objPHPExcel->getActiveSheet()->getCell($alpha.'1')->setValueExplicit($_POST['obj'][$i], PHPExcel_Cell_DataType::TYPE_STRING);
                    $alpha++;
                }
            } elseif ($_POST['obj']) {
                $rowCount = 2;
                foreach($_POST["obj"] as $rows) {
                   $col = 0;
                   $headers = array_keys($rows);
                    // Set the Headers.
                    $alpha = 'A';
                    for ($i = 0; $i < 83; $i++) {
                        $objPHPExcel->getActiveSheet()->getCell($alpha.'1')->setValueExplicit($headers[$i], PHPExcel_Cell_DataType::TYPE_STRING);
                        $alpha++;
                    }

                    // Set the Data in Excel File.
                    foreach($rows as $key=>$value) {
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowCount, $value);
                        $col++;
                    }
                    $rowCount++;
                }
            }
            $fileName = 'appUserList'.date("Y-m-d_H-i-s").'.xlsx';

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=' . $fileName);
            header('Cache-Control: max-age = 0');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
            exit();
    }


?>