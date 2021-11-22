<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageVisitorController extends AbstractController
{
    /**
     * @Route("/visitor", name="visitor")
     */
    public function index(): Response
    {
        return $this->render('page_visitor/index.html.twig', [
            'controller_name' => 'PageVisitorController',
        ]);    
    }

}
