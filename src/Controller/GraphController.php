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
     * @Route("/", name="graph")
     */
    public function index(): Response
    {
        return $this->render('graph/index.html.twig', [
            'controller_name' => 'GraphController',
        ]);
    }
}
