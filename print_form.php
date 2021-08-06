<?php

require_once 'inc/php.php';
if(!isset($_GET['app_id'])){
    header("location:admin.php");
    exit();
}
if(!login()){
        header("location:login.php");
        exit();     
} 
$app_id = $_GET['app_id'];
if($app_id == "")
{
    header("location:admin.php");
    exit();
}
$sql = $db->query("SELECT * FROM allocation WHERE app_id='$app_id'") ;
$num = $sql->rowCount();
if($num == 0)
{
    header("location:admin.php");
    exit();
}
$rs = $sql->fetch(PDO::FETCH_ASSOC);
extract($rs);
//var_dump($rs);
//exit();
require('lib/fpdf181/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('img/logo.png',10,6,30);
    // Times bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'LAND INFORMATION SYSTEM',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Times italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'(C) 2016 - Ministry of Lands, Physical Planning and Urban Development ',0,0,'C');
}

}
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setTitle("Allocation Receipt");
$w = 220;
$h = 200;
$pdf->Image('img/bg.png', 0, 0, $w, $h);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(30);
$pdf->Cell(20,10,'LAND ALLOCATION RECEIPT ',0,0,'C');
$pdf->Ln(20);
$pdf->SetFont('Times','',10);

//for($i=1;$i<=40;$i++)
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Application Id:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$app_id,0,1);
    
    //$pdf->Ln(1);
    
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Application Date:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,date("F d, Y",$allocation_date),0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Applicant Name:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$applicant_name,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Applicant Address:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$applicant_address,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Applicant State:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$state,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Applicant LGA:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$lga,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Applicant Occupation:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$occupation,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Applicant Email:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$email,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Applicant Phone:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$phone,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Land LGA:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$lga_situated,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Land Use:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$land_use,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Land Plot No:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$plot_no,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Land Plot Size:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$plot_size,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Land Block No:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,$block_no,0,1);

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,10,'Date Updated:',0,0);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(50,10,@date("F d, Y",$date_updated),0,1);    

    $pdf->Ln(20);

    $pdf->SetFont('Times','IB',8);
    $pdf->Cell(50,10,'Date Printed:',0,0);    
    $pdf->Cell(50,10,date("d/m/Y , h : i : a"),0,1);

$pdf->Output();

?>