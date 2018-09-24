<?php

namespace App\DataLayer;

use App\Contrat\IPatientDAO;
use App\Entity\Patient;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PatientDAOExcel implements IPatientDAO{


  public function __construct() {

  }

  public function ajouter($patient) {
    $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Hello World !');
  $sheet->setCellValue('B1', 'Hello World !');
  $sheet->setCellValue('C1', 'Hello World !');
  $sheet->setCellValue('A4', 'Hello World !');
  $sheet->setCellValue('A5', 'Hello World !');
  $sheet->setCellValue('A6', 'Hello World !');
  $sheet->setCellValue('A7', 'Hello World !');

  $writer = new Xlsx($spreadsheet);
  $writer->save('D:\\CUSTOMDATA\\file.xlsx');

  }

  public function modifie($patient) {

  }

  public function supprimer($id) {

  }

  public function findByID($id) {

  }

  public function findAll() {

  }

  public function valider() {

  }



}
