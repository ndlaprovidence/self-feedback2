<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Repository\AvisRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TableController extends AbstractController
{
    /**
     * @Route("/table", name="table")
     */
    public function index(AvisRepository $avisRepository): Response
    {
        return $this->render('table/index.html.twig', [
            'Avis' => $avisRepository->findAll(),
        ]);
    }

    public function show(Avis $avis): Response
    {
        return $this->render('table/index.html.twig', [
            'avis' => $avis,
        ]);
    }
}
