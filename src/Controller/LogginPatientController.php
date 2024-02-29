<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LogginPatientController extends AbstractController
{
    #[Route('/patient/loggin', name: 'app_loggin')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
       
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('loggin_patient/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            
        ]);
    }

    public function secutitePatient(Security $security)
    {
        $user = $security->getUser();

      
        if ($user instanceof \App\Entity\Patient) {
         
            $nom = $user->getNomPatient();
            $prenom = $user->getPrenomPatient();
            $email = $user->getEmail();
            
        }
        


    }
}


