<?php

namespace App\Controller;

use Dompdf\Dompdf;
use App\Repository\AvisRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function dashboard(AvisRepository $avisRepository,Request $request)
    {
        $startDate = $request->get('startDate'); 
        if ($startDate == null) {
            $startDate = date('Y-m-d');
        }       
        $endDate = $request->get('endDate');        
        if ($endDate == null) {
            $endDate = date('Y-m-d');
        }       

        $gout1 = $avisRepository->countgout(1, $startDate, $endDate);
        $gout2 = $avisRepository->countgout(2, $startDate, $endDate);
        $gout3 = $avisRepository->countgout(3, $startDate, $endDate);
        $gout4 = $avisRepository->countgout(4, $startDate, $endDate);
        $gout5 = $avisRepository->countgout(5, $startDate, $endDate);

        $diver1 = $avisRepository->countdiver(1, $startDate, $endDate);
        $diver2 = $avisRepository->countdiver(2, $startDate, $endDate);
        $diver3 = $avisRepository->countdiver(3, $startDate, $endDate);
        $diver4 = $avisRepository->countdiver(4, $startDate, $endDate);
        $diver5 = $avisRepository->countdiver(5, $startDate, $endDate);
        
        $chaleur1 = $avisRepository->countchaleur(1, $startDate, $endDate);
        $chaleur2 = $avisRepository->countchaleur(2, $startDate, $endDate);
        $chaleur3 = $avisRepository->countchaleur(3, $startDate, $endDate);
        $chaleur4 = $avisRepository->countchaleur(4, $startDate, $endDate);
        $chaleur5 = $avisRepository->countchaleur(5, $startDate, $endDate);
        
        $dispo1 = $avisRepository->countdispo(1, $startDate, $endDate);
        $dispo2 = $avisRepository->countdispo(2, $startDate, $endDate);
        $dispo3 = $avisRepository->countdispo(3, $startDate, $endDate);
        $dispo4 = $avisRepository->countdispo(4, $startDate, $endDate);
        $dispo5 = $avisRepository->countdispo(5, $startDate, $endDate);
        
        $propr1 = $avisRepository->countpropr(1, $startDate, $endDate);
        $propr2 = $avisRepository->countpropr(2, $startDate, $endDate);
        $propr3 = $avisRepository->countpropr(3, $startDate, $endDate);
        $propr4 = $avisRepository->countpropr(4, $startDate, $endDate);
        $propr5 = $avisRepository->countpropr(5, $startDate, $endDate);

        $accueil1 = $avisRepository->countaccueil(1, $startDate, $endDate);
        $accueil2 = $avisRepository->countaccueil(2, $startDate, $endDate);
        $accueil3 = $avisRepository->countaccueil(3, $startDate, $endDate);
        $accueil4 = $avisRepository->countaccueil(4, $startDate, $endDate);
        $accueil5 = $avisRepository->countaccueil(5, $startDate, $endDate);

        $data_gout = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label' => 'Gout !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $gout1[1],$gout2[1],$gout3[1],$gout4[1],$gout5[1]
                    ],
                ],
            ],
        ];

        $data_diversite = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label2' => 'Diversité !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $diver1[1],$diver2[1],$diver3[1],$diver4[1],$diver5[1]
                    ],
                ],
            ],
        ];

        $data_chaleur = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label2' => 'Chaleur !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $chaleur1[1],$chaleur2[1],$chaleur3[1],$chaleur4[1],$chaleur5[1]
                    ],
                ],
            ],
        ];

        $data_disponibilite = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label2' => 'Disponibilité !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $dispo1[1],$dispo2[1],$dispo3[1],$dispo4[1],$dispo5[1]
                    ],
                ],
            ],
        ];

        $data_proprete = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label2' => 'Propreté !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $propr1[1],$propr2[1],$propr3[1],$propr4[1],$propr5[1]
                    ],
                ],
            ],
        ];

        $data_accueil = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label2' => 'Accueil !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $accueil1[1],$accueil2[1],$accueil3[1],$accueil4[1],$propr5[1]
                    ],
                ],
            ],
        ];

        return $this->render('graph/index.html.twig', [
            'data_gout' => json_encode($data_gout),
            'data_diversite' => json_encode($data_diversite),
            'data_chaleur' => json_encode($data_chaleur),
            'data_disponibilite' => json_encode($data_disponibilite),
            'data_proprete' => json_encode($data_proprete),
            'data_accueil' => json_encode($data_accueil),
            'startDate' => $startDate,
            'endDate' => $endDate,
            
        ]);
    }

    /**
     * @Route("/dashboard/pdf", name="graph_dashboard_pdf")
     */
    public function ExportPDF(AvisRepository $avisRepository, Request $request)
    {
        $startDate = $request->get('startDate'); 
        if ($startDate == null) {
            $startDate = date('Y-m-d');
        }       
        $endDate = $request->get('endDate');        
        if ($endDate == null) {
            $endDate = date('Y-m-d');
        }       

        $gout1 = $avisRepository->countgout(1, $startDate, $endDate);
        $gout2 = $avisRepository->countgout(2, $startDate, $endDate);
        $gout3 = $avisRepository->countgout(3, $startDate, $endDate);
        $gout4 = $avisRepository->countgout(4, $startDate, $endDate);
        $gout5 = $avisRepository->countgout(5, $startDate, $endDate);

        $diver1 = $avisRepository->countdiver(1, $startDate, $endDate);
        $diver2 = $avisRepository->countdiver(2, $startDate, $endDate);
        $diver3 = $avisRepository->countdiver(3, $startDate, $endDate);
        $diver4 = $avisRepository->countdiver(4, $startDate, $endDate);
        $diver5 = $avisRepository->countdiver(5, $startDate, $endDate);
        
        $chaleur1 = $avisRepository->countchaleur(1, $startDate, $endDate);
        $chaleur2 = $avisRepository->countchaleur(2, $startDate, $endDate);
        $chaleur3 = $avisRepository->countchaleur(3, $startDate, $endDate);
        $chaleur4 = $avisRepository->countchaleur(4, $startDate, $endDate);
        $chaleur5 = $avisRepository->countchaleur(5, $startDate, $endDate);
        
        $dispo1 = $avisRepository->countdispo(1, $startDate, $endDate);
        $dispo2 = $avisRepository->countdispo(2, $startDate, $endDate);
        $dispo3 = $avisRepository->countdispo(3, $startDate, $endDate);
        $dispo4 = $avisRepository->countdispo(4, $startDate, $endDate);
        $dispo5 = $avisRepository->countdispo(5, $startDate, $endDate);
        
        $propr1 = $avisRepository->countpropr(1, $startDate, $endDate);
        $propr2 = $avisRepository->countpropr(2, $startDate, $endDate);
        $propr3 = $avisRepository->countpropr(3, $startDate, $endDate);
        $propr4 = $avisRepository->countpropr(4, $startDate, $endDate);
        $propr5 = $avisRepository->countpropr(5, $startDate, $endDate);

        $accueil1 = $avisRepository->countaccueil(1, $startDate, $endDate);
        $accueil2 = $avisRepository->countaccueil(2, $startDate, $endDate);
        $accueil3 = $avisRepository->countaccueil(3, $startDate, $endDate);
        $accueil4 = $avisRepository->countaccueil(4, $startDate, $endDate);
        $accueil5 = $avisRepository->countaccueil(5, $startDate, $endDate);
        $data_gout = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label' => 'Gout !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $gout1[1],$gout2[1],$gout3[1],$gout4[1],$gout5[1]
                    ],
                ],
            ],
        ];

        $data_diversite = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label2' => 'Diversité !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $diver1[1],$diver2[1],$diver3[1],$diver4[1],$diver5[1]
                    ],
                ],
            ],
        ];

        $data_chaleur = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label2' => 'Chaleur !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $chaleur1[1],$chaleur2[1],$chaleur3[1],$chaleur4[1],$chaleur5[1]
                    ],
                ],
            ],
        ];

        $data_disponibilite = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label2' => 'Disponibilité !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $dispo1[1],$dispo2[1],$dispo3[1],$dispo4[1],$dispo5[1]
                    ],
                ],
            ],
        ];

        $data_proprete = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label2' => 'Propreté !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $propr1[1],$propr2[1],$propr3[1],$propr4[1],$propr5[1]
                    ],
                ],
            ],
        ];

        $data_accueil = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label2' => 'Accueil !',
                    'backgroundColor' => [
                        'rgba(255,1,0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'borderColor' => [
                        'rgba(255, 0, 0)',
                        'rgba(255, 71, 9)',
                        'rgba(255, 174, 9)',
                        'rgba(166, 217, 79)',
                        'rgba(82, 192, 0)'],
                    'data' => [
                        $accueil1[1],$accueil2[1],$accueil3[1],$accueil4[1],$propr5[1]
                    ],
                ],
            ],
        ];

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $contents = $this->renderView('graph/index.html.twig', [
            'data_gout' => json_encode($data_gout),
            'data_diversite' => json_encode($data_diversite),
            'data_chaleur' => json_encode($data_chaleur),
            'data_disponibilite' => json_encode($data_disponibilite),
            'data_proprete' => json_encode($data_proprete),
            'data_accueil' => json_encode($data_accueil),

            'startDate' => $startDate,
            'endDate' => $endDate,
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
