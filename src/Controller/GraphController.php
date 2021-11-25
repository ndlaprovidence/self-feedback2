<?php

namespace App\Controller;

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
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Sales!',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [522, 1500, 2250, 2197, 2345, 3122, 3099],
                ],
            ],
        ];
        return $this->render('graph/index.html.twig', [
            'data' => json_encode($data),
        ]);
    }
}
