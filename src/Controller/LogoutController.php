<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;


class LogoutController extends AbstractController 

{
    
    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
       
    }
    public function onLogoutSuccess(): RedirectResponse
    {
        // Redirection après la déconnexion
        return $this->redirectToRoute('app_login');
    }
}
