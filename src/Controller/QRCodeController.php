<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class QRCodeController extends AbstractController
{
    /**
     * @Route("/qrcode", name="qrcode")
     */
    public function index(): Response
    {
        $writer = new PngWriter();
        $qrCode = QrCode::create('https://ndlpavranches.fr/')
        ->setEncoding(new Encoding('UTF-8'))
        ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
        ->setSize(300)
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
            


        return $this->render('qr_code/index.html.twig', [
            'controller_name' => 'QRCodeController',
            'data_url' => $dataUri,
        ]);
    }
    
}
