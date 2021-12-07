<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/graph", name="")
 */
class GraphController extends AbstractController
{
    /**
     * @Route("/", name="graph_home")
     */
    public function index(): Response
    {
        return $this->render('graph/index.html.twig', [
            'controller_name' => 'GraphController',
        ]);
    }

    /**
     * @Route("/dashboard", name="graph_dashboard")
     */
    public function dashboard()
    {

        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Hugo JENOUVRIER');
        $pdf->SetTitle('Avis 01');
        $pdf->SetSubject('Avis sur le self');

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once dirname(__FILE__) . '/lang/eng.php';
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('helvetica', 'B', 20);

        // add a page
        $pdf->AddPage();

        $pdf->Write(0, 'Accueil');

        $xc = 105;
        $yc = 100;
        $r = 50;

        $pdf->SetFillColor(0, 0, 255);
        $pdf->PieSector($xc, $yc, $r, 20, 120, 'FD', false, 0, 2);

        $pdf->SetFillColor(0, 255, 0);
        $pdf->PieSector($xc, $yc, $r, 120, 250, 'FD', false, 0, 2);

        $pdf->SetFillColor(255, 0, 0);
        $pdf->PieSector($xc, $yc, $r, 250, 20, 'FD', false, 0, 2);

        $pdf->SetFillColor(255, 255, 0);
        $pdf->PieSector($xc, $yc, $r, 200, 250, 'FD', false, 0, 2);

        
        // write labels
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Text(105, 65, '1');
        $pdf->Text(60, 95, '2');
        $pdf->Text(120, 115, '3');
        $pdf->Text(80, 115, '4');




        // $pdf->Image($image_file, 10, 10, 20, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $pdf->SetTextColor(0, 0, 0);
        // Set font
        $pdf->SetFont('helvetica', 'B', 40);
        // Title
        $pdf->SetXY(0, 0);
        $pdf->Cell(210, 50, 'FeedBack 01 ', 0, false, 'C');

        // ---------------------------------------------------------

        //Close and output PDF document
        $pdf->Output('example_031.pdf', 'I');
        return $this->render('graph/index.html.twig', [

        ]);
    }
}
// class MYPDF extends \TCPDF {

//     //Page header
//     public function Header() {
//         // Logo
//         $image_file = K_PATH_IMAGES.'ndlp.jpg';
//         $this->Image($image_file, 10, 10, 20, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
//         // Set font
//         $this->SetFont('helvetica', 'B', 20);
//         // Title
//         $this->Cell(0, 15, 'FeedBack 01 ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
//     }

//     // Page footer
//     public function Footer() {
//         // Position at 15 mm from bottom
//         $this->SetY(-15);
//         // Set font
//         $this->SetFont('helvetica', 'I', 8);
//         // Page number
//         $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
//     }
// }
