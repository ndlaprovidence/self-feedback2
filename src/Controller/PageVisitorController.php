<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\PageVisitorType;
use App\Entity\TypesUtilisateurs;
use App\Repository\TypesRepasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\TypesUtilisateursRepository;
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
    public function save(EntityManagerInterface $entityManager, Request $request, TypesUtilisateursRepository $typesUtilisateursRepository, TypesRepasRepository $typesRepasRepository ): Response
    {

        $page_visitor= $request->get('page_visitor');
        $user_type_id = $page_visitor['user_type'];
        $unTypesUtilisateurs = $typesUtilisateursRepository->findOneById($user_type_id);

        $page_visitor= $request->get('page_visitor');
        $repas_type_id = $page_visitor['repas_type'];
        $unTypesRepas = $typesRepasRepository->findOneById($repas_type_id);

        //$classe = $_GET['[user_type]'];
        //$classe = $_GET['user_type'];
        // $classe = $_GET['page_visitor_user_type'];
        // $classe = $_GET['page_visitor_user_type_'];
        // $classe = $_GET['page_visitoruser_type'];
        // $classe = $_GET['page_visitor[user_type]'];
        $avis = new Avis();
        //$class = new TypesUtilisateurs();
        $avis->setProprete($request->get('note-proprete'));
        $avis->setGout($request->get('note-gout'));
        $avis->setDiversite($request->get('note-diversite'));
        $avis->setAcceuil($request->get('note-accueil'));
        $avis->setDisponibilite($request->get('note-disponibilite'));
        $avis->setChaleur($request->get('note-chaleur'));
        $avis->setCommentaire($request->get('commentaire'));
        $avis->setTypesUtilisateurs($unTypesUtilisateurs);
        $avis->setRepas($unTypesRepas);
        dump();
        $entityManager->persist($avis);
        $entityManager->flush();
        return $this->render('page_visitor/save.html.twig');    
    }
}
