<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\PageVisitorType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    
    /**
     * @Route("/visitor2", name="visitor")
     */
    public function new(EntityManagerInterface $entityManager, Request $request): Response
    {
        // creates a task object and initializes some data for this example
        $avis = new Avis();
        
        

        $form = $this->createForm(PageVisitorType::class, $avis);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $avis= $form->getData();
            $entityManager->persist($avis);
            $entityManager->flush();



            return $this->redirectToRoute('home');
        }
        return $this->render('page_visitor/index.html.twig', [
            'formulaire' => $form->createView(),
        ]);
        // ...
    }


}
