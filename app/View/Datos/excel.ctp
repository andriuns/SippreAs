<?php
 
// Importamos la clase PHPExcel
App::import('Vendor', 'Classes/PHPExcel');
        
$objPHPExcel = new PHPExcel();
 
$objPHPExcel->getProperties()->setCreator("Sippreas")
                             ->setLastModifiedBy("Sippreas")
                             ->setTitle("Office 2007 XLSX Test Document")
                             ->setSubject("Office 2007 XLSX Test Document")
                             ->setDescription("Sippreas.")
                             ->setKeywords("office 2007 openxml php")
                             ->setCategory("Resultado exportacion");
 
 
//agregamos los datos
$i=1;
//debug($posts);
//die();
foreach ($posts as $post){
  //  debug( $posts['Dato']['datos']);
    //die();
  $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$i++, $posts['Dato']['datos']);
}
 
$objPHPExcel->getActiveSheet()->setTitle('Sippreas');
$objPHPExcel->setActiveSheetIndex(0);
 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ejemplo.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>