<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Twilio\Rest\Client;



class SmsController extends AbstractController
{


    #[Route('/app-sms', name: 'app_sms', methods: ['POST','GET'])]
    public function sendSMS(Request $request)
    {
        $toPhoneNumber = $request->request->get('toPhoneNumber');

        $sid = 'ACdb7c4d594c9744a4b025ee3abd58fc19';
        $token = 'c1fc56312b92ece2deb4c16f10b98b43';
        $client = new Client($sid, $token);
        $message = $client->messages->create(
            "+216".$toPhoneNumber,
            [
                'from' => '+12766002191',
                'body' => 'Bonjour, on va partir dans 30 min préparez-vous ',
            ]
        );


        return $this->redirectToRoute('offrecovoiturage_sms', [], Response::HTTP_SEE_OTHER);

    }
}