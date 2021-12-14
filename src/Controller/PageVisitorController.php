<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\PageVisitorType;
use App\Entity\TypesUtilisateurs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/visitor")
 */
class PageVisitorController extends AbstractController
{
    /**
     * @Route("/", name="visitor_index")
     */
    public function index(EntityManagerInterface $manager,Request $request): Response
    {
        $form = $this->createForm(PageVisitorType::class);
        $form->handlerequest($request);
        $avis = $form->getData();
       

        return $this->render('page_visitor/index.html.twig',[
            'form' => $form->createView(),
        ]);    
    }
    
    /**
     * @Route("/save", name="visitor_save")
     */
    public function save(EntityManagerInterface $entityManager, Request $request): Response
    {
        $avis = new Avis();
        $classe = new TypesUtilisateurs();
        
        $avis->setProprete($request->get('note-proprete'));
        $avis->setGout($request->get('note-gout'));
        $avis->setDiversite($request->get('note-diversite'));
        $avis->setAcceuil($request->get('note-accueil'));
        $avis->setDisponibilite($request->get('note-disponibilite'));
        $avis->setChaleur($request->get('note-chaleur'));
        $avis->setCommentaire($request->get('commentaire'));
        $classe->setLibelleT($request->get('libelle_t'));
        $entityManager->persist($avis,$classe);
        $entityManager->flush();
        return $this->render('page_visitor/save.html.twig');    
    }
}
