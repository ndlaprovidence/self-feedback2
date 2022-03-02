<?php

namespace App\Controller;

use App\Form\PinQrCodeType;
use App\Repository\PinQRcodeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PinController extends AbstractController
{
    /**
     * @Route("/pin", name="app_pin")
     */
    public function index(RequestStack $requestStack,PinQRcodeRepository $pinRepository, Request $request): Response
    {
        $form = $this->createForm(PinQrCodeType::class);
        $form->handlerequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $value= $request->get('pin_qr_code');
            $pin = $value['pin'];

            $session = $requestStack->getSession();
            $session->set('pinOK', 'pinOK');
            
            if ($pinRepository->searchPin($pin) != null){
                return $this->redirectToRoute("qrcode_visitor");
            }
        }


        return $this->render('page_visitor/access_qrcode.html.twig', [
            'controller_name' => 'PinController',
            'form' => $form->createView(),
        ]);
    }


}
