<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Repository\AvisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/table")
 */
class TableController extends AbstractController
{
    /**
     * @Route("/", name="table_index")
     */
    public function index(AvisRepository $avisRepository): Response
    {
        return $this->render('table/index.html.twig', [
            'Avis' => $avisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/show", name="table_show")
     */
    public function show(Avis $avis): Response
    {
        return $this->render('table/index.html.twig', [
            'avis' => $avis,
        ]);
    }

    /**
     * @Route("/sendmail", name="table_sendmail")
     */
    public function sendMail(AvisRepository $avisRepository): Response
    {
        // 'table/mail.html.twig'

        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Rapport')
            ->text('')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            // some error prevented the email sending; display an
            // error message or try to resend the message
        }

        return $this->render('table/index.html.twig', [
            'Avis' => $avisRepository->findAll(),
        ]);
    }
}
