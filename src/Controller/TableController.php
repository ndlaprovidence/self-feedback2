<?php

namespace App\Controller;

use Dompdf\Dompdf;
use App\Entity\Avis;
use App\Repository\AvisRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/table")
 */
class TableController extends AbstractController
{

    /**
     * @Route("/", name="table_index")
     */
    public function index(AvisRepository $avisRepository): Response
    {
        return $this->render('table/index.html.twig', [
            'Avis' => $avisRepository->findAll(),
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
     * @Route("/pdf", name="table_pdf")
     */
    public function exportPdf(AvisRepository $avisRepository)
    {
        $lesAvis = $avisRepository->findAll();

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $contents = $this->renderView('table/pdf.html.twig', [
            'les_avis' => $lesAvis,
        ]);

        $dompdf->loadHtml($contents);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        $fichier= 'Avis.pdf';

        // Output the generated PDF to Browser
        return $dompdf->stream($fichier);
    }

}
