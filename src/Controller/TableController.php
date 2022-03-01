<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Repository\AvisRepository;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/table")
 */
class TableController extends AbstractController
{

    /**
     * @Route("/", name="table_index")
     */
    public function index(AvisRepository $avisRepository, Request $request): Response
    {
        $startDate = $request->get('startDate');
        if ($startDate == null) {
            $startDate = date('Y-m-d');
        }
        $endDate = $request->get('endDate');
        if ($endDate == null) {
            $endDate = date('Y-m-d');
        }

        return $this->render('table/index.html.twig', [
            'Avis' => $avisRepository->findByDates($startDate, $endDate),
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }

    /**
     * @Route("/show", name="table_show")
     */
    public function show(Avis $avis): Response
    {
        return $this->render('table/index.html.twig', [
            'avis' => $avis,
        ]);
    }

    /**
     * @Route("/sendexcel", name="table_sendexcel")
     */
    public function sendExcel(AvisRepository $avisRepository, Request $request, LoggerInterface $logger): Response
    {
        $startDate = $request->get('startDate');
        $logger->info("exportPdf.startDate = '" . $startDate . "'");

        if ($startDate == null) {
            $startDate = date('Y-m-d');
        }
        $endDate = $request->get('endDate');
        if ($endDate == null) {
            $endDate = date('Y-m-d');
        }
        $spreadsheet = new Spreadsheet();

        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('B1', 'Gout');
        $sheet->setCellValue('C1', 'Diversité');
        $sheet->setCellValue('D1', 'Chaleur');
        $sheet->setCellValue('E1', 'Disponibilité');
        $sheet->setCellValue('F1', 'Propreté');
        $sheet->setCellValue('G1', 'Accueil');

        $sheet->setTitle("Les Avis");

        $lesAvis = $avisRepository->findByDates($startDate, $endDate);
        $i = 1;
        foreach ($lesAvis as $avis) {
            $i++;
            $sheet->setCellValue('B' . $i, $avis->getGout());
            $sheet->setCellValue('C' . $i, $avis->getDiversite());
            $sheet->setCellValue('D' . $i, $avis->getChaleur());
            $sheet->setCellValue('E' . $i, $avis->getDisponibilite());
            $sheet->setCellValue('F' . $i, $avis->getProprete());
            $sheet->setCellValue('G' . $i, $avis->getAcceuil());
        }

        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);

        // Create a Temporary file in the system
        $fileName = 'feedback_data_' . date('d-m-Y') . '.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);

        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);

        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);
        // return $this->render('table/index.html.twig', [
        //     'Avis' => $avisRepository->findAll(),
        // ]);
    }

    /**
     * @Route("/pdf", name="table_pdf")
     */
    public function exportPdf(AvisRepository $avisRepository, Request $request, LoggerInterface $logger)
    {
        $startDate = $request->get('startDate');
        $logger->info("exportPdf.startDate = '" . $startDate . "'");

        if ($startDate == null) {
            $startDate = date('Y-m-d');
        }
        $endDate = $request->get('endDate');
        if ($endDate == null) {
            $endDate = date('Y-m-d');
        }

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $contents = $this->renderView('table/pdf.html.twig', [
            'les_avis' => $avisRepository->findByDates($startDate, $endDate),
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);

        $dompdf->loadHtml($contents);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        $fichier = 'Commentaires du' . $startDate . ' au ' . $endDate . '.pdf';

        // Output the generated PDF to Browser
        return $dompdf->stream($fichier);
    }

    // /**
    //  * @Route("/", name="table_duree")
    //  */
    // public function TriDate(AvisRepository $avisRepository)
    // {
    //     $lesAvis = $avisRepository->findAll();

    //     $response = $this->render('table/index.html.twig', [
    //         'date1' => $date1,
    //         'date2' => $date2,

    //     ]);

    // }
}
