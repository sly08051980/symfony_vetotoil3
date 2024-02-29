<?php

namespace App\Controller;
use App\Form\PatientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LogginPatientController extends AbstractController
{
    #[Route('/patient/loggin', name: 'app_loggin')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        // Récupérer les erreurs d'authentification, s'il y en a
        $error = $authenticationUtils->getLastAuthenticationError();

        // Récupérer le dernier nom d'utilisateur (email) saisi par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        // Créer le formulaire de connexion
        $form = $this->createForm(PatientType::class);

        // Gérer la soumission du formulaire de connexion
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Si le formulaire est soumis et valide, vous pouvez traiter l'authentification ici
            // Par exemple, vous pouvez utiliser le composant de sécurité de Symfony pour gérer l'authentification
            // En fonction de votre configuration de sécurité, Symfony gérera automatiquement l'authentification et redirigera l'utilisateur vers la page appropriée
        }

        // Rendre le template avec le formulaire de connexion
        return $this->render('loggin_patient/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'form' => $form->createView(),
        ]);
    }
}