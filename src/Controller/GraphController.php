<?php

namespace App\Controller;

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


        $data = [
            'labels' => ['1 étoiles','2 étoiles','3 étoiles','4 étoiles','5 étoiles'],
            'datasets' => [
                [
                    'label' => 'Gout!',
                    'backgroundColor' => [
                        'rgba(255, 0, 0)',
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



        return $this->render('graph/index.html.twig', [
            'data' => json_encode($data),
        ]);
    }
}
