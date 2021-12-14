<?php

namespace App\Controller;

use Dompdf\Dompdf;
use App\Repository\AvisRepository;
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
    public function dashboard(AvisRepository $avisRepository)
    {
        $gout1 = $avisRepository->countgout(1);
        $gout2 = $avisRepository->countgout(2);
        $gout3 = $avisRepository->countgout(3);
        $gout4 = $avisRepository->countgout(4);
        $gout5 = $avisRepository->countgout(5);

        $diver1 = $avisRepository->countdiver(1);
        $diver2 = $avisRepository->countdiver(2);
        $diver3 = $avisRepository->countdiver(3);
        $diver4 = $avisRepository->countdiver(4);
        $diver5 = $avisRepository->countdiver(5);
        
        $chaleur1 = $avisRepository->countchaleur(1);
        $chaleur2 = $avisRepository->countchaleur(2);
        $chaleur3 = $avisRepository->countchaleur(3);
        $chaleur4 = $avisRepository->countchaleur(4);
        $chaleur5 = $avisRepository->countchaleur(5);
        
        $dispo1 = $avisRepository->countdispo(1);
        $dispo2 = $avisRepository->countdispo(2);
        $dispo3 = $avisRepository->countdispo(3);
        $dispo4 = $avisRepository->countdispo(4);
        $dispo5 = $avisRepository->countdispo(5);
        
        $propr1 = $avisRepository->countpropr(1);
        $propr2 = $avisRepository->countpropr(2);
        $propr3 = $avisRepository->countpropr(3);
        $propr4 = $avisRepository->countpropr(4);
        $propr5 = $avisRepository->countpropr(5);

        $accueil1 = $avisRepository->countaccueil(1);
        $accueil2 = $avisRepository->countaccueil(2);
        $accueil3 = $avisRepository->countaccueil(3);
        $accueil4 = $avisRepository->countaccueil(4);
        $accueil5 = $avisRepository->countaccueil(5);

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

            
        ]);
    }

    /**
     * @Route("/dashboard/pdf", name="graph_dashboard_pdf")
     */
    public function ExportPDF(AvisRepository $avisRepository)
    {
        $gout1 = $avisRepository->countgout(1);
        $gout2 = $avisRepository->countgout(2);
        $gout3 = $avisRepository->countgout(3);
        $gout4 = $avisRepository->countgout(4);
        $gout5 = $avisRepository->countgout(5);

        $diver1 = $avisRepository->countdiver(1);
        $diver2 = $avisRepository->countdiver(2);
        $diver3 = $avisRepository->countdiver(3);
        $diver4 = $avisRepository->countdiver(4);
        $diver5 = $avisRepository->countdiver(5);
        
        $chaleur1 = $avisRepository->countchaleur(1);
        $chaleur2 = $avisRepository->countchaleur(2);
        $chaleur3 = $avisRepository->countchaleur(3);
        $chaleur4 = $avisRepository->countchaleur(4);
        $chaleur5 = $avisRepository->countchaleur(5);
        
        $dispo1 = $avisRepository->countdispo(1);
        $dispo2 = $avisRepository->countdispo(2);
        $dispo3 = $avisRepository->countdispo(3);
        $dispo4 = $avisRepository->countdispo(4);
        $dispo5 = $avisRepository->countdispo(5);
        
        $propr1 = $avisRepository->countpropr(1);
        $propr2 = $avisRepository->countpropr(2);
        $propr3 = $avisRepository->countpropr(3);
        $propr4 = $avisRepository->countpropr(4);
        $propr5 = $avisRepository->countpropr(5);

        $accueil1 = $avisRepository->countaccueil(1);
        $accueil2 = $avisRepository->countaccueil(2);
        $accueil3 = $avisRepository->countaccueil(3);
        $accueil4 = $avisRepository->countaccueil(4);
        $accueil5 = $avisRepository->countaccueil(5);

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
