<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Form\SocieteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SocieteController extends AbstractController
{
    #[Route('/societe', name: 'app_societe')]
    public function inscriptionSociete(UserPasswordHasherInterface $passwordHasher, Request $request, EntityManagerInterface $entityManager): Response
    {
        $societe = new Societe();
        $societe->setDateCreationSociete(new \DateTime());
        $form = $this->createForm(SocieteType::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $textPassword = $societe->getPassword();
            $hashedPassword = $passwordHasher->hashPassword($societe, $textPassword);
            $societe->setPassword($hashedPassword);
            $societe->setRoles(['ROLE_SOCIETE']);
            $entityManager->persist($societe);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('societe/societeinscription.html.twig', [
            'form' => $form->createView(), 
            'controller_name' => 'SocieteController',
        ]);
    }
    #[Route('/societe/connexion',name:'app_societe_connexion')]
    public function loginSociete(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
       
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('societe/societelogin.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            
        ]);
    }
}
