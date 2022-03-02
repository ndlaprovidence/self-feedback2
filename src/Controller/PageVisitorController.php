<?php

namespace App\Controller;

use DateTime;
use App\Entity\Avis;
use App\Entity\Repas;
use Endroid\QrCode\QrCode;
use App\Entity\QrCodeToken;
use App\Form\PageVisitorType;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Color\Color;
use App\Entity\TypesUtilisateurs;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use App\Repository\TypesRepasRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\QrCodeTokenRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\TypesUtilisateursRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/")
 */
class PageVisitorController extends AbstractController
{
    /**
     * @Route("/", name="qrcode_visitor")
     */
    public function index(RequestStack $requestStack, QrCodeTokenRepository $qrCodeTokenRepository,EntityManagerInterface $manager,Request $request): Response
    {
        $session = $requestStack->getSession();
        $pinOK = $session->get('pinOK');
        if (!isset ($pinOK)){
             return $this->redirectToRoute("app_pin");
        } 
        
        $date = date("d-m-y");
        $req = $qrCodeTokenRepository->tokenExist($date);
       
        if ( $req != null){
            // si token existe
            $token = $req->getToken(); 
        } else {
            // si token existe pas
            $token = bin2hex(random_bytes(50));
            $qrCodeToken = new qrCodeToken();
            $qrCodeToken->setDate($date);
            $qrCodeToken->setToken($token);
            $manager->persist($qrCodeToken);
            $manager->flush();
        }
        
        
       
       $ip = $request->server->get('SERVER_NAME');
       
       $url = 'https://'.$ip.'/form?token='.$token;
       
        $writer = new PngWriter();
        $qrCode = QrCode::create($url)
        ->setEncoding(new Encoding('UTF-8'))
        ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
        ->setSize(500)
        ->setMargin(10)
        ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
        ->setForegroundColor(new Color(0, 0, 0))
        ->setBackgroundColor(new Color(255, 255, 255));

        $logo = Logo::create('images/ndlp.jpg')
        ->setResizeToWidth(50);

        //$label = Label::create('Label')
        //->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode, $logo);
  

        $dataUri = $result->getDataUri();
            
        $form = $this->createForm(PageVisitorType::class);
        $form->handlerequest($request);
        $avis = $form->getData();
        return $this->render('page_visitor/qrcode.html.twig',[
            'form' => $form->createView(),
            'data_url' => $dataUri,

        ]);    
    }
    /**
     * @Route("/form", name="visitor_index")
     */
    public function form(QrCodeTokenRepository $qrCodeTokenRepository,EntityManagerInterface $manager,Request $request): Response
    {
        $token = $_GET['token'];
        $date = date("d-m-y");
         if ($qrCodeTokenRepository->tokenVerify($date)->getToken() != $token){

            return $this->redirectToRoute("error_token");
         } 
        
        $form = $this->createForm(PageVisitorType::class);
        $form->handlerequest($request);
        return $this->render('page_visitor/index.html.twig',[
            'form' => $form->createView(),

        ]);    
    }
        /**
     * @Route("/tokenError", name="error_token")
     */
    public function errorToken(QrCodeTokenRepository $qrCodeTokenRepository,EntityManagerInterface $manager,Request $request): Response
    {
        return $this->render('page_visitor/error-token.html.twig',[
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

        $repas = new Repas();
        $repas->setDateRepas(new DateTime);
        $repas->setHeure(new DateTime);
        $repas->setTypesRepas($unTypesRepas);
        $entityManager->persist($repas);

        $avis->setRepas($repas);
        $entityManager->persist($avis);
        $entityManager->flush();
        return $this->render('page_visitor/save.html.twig');    
    }
}
