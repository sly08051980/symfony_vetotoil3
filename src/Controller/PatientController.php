<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\PatientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class PatientController extends AbstractController
{


    #[Route('/patient', name: 'app_patient')]
    public function inscriptionPatient(UserPasswordHasherInterface $passwordHasher,Request $request,EntityManagerInterface $entityManager): Response
    {
        $patient = new Patient();
        $patient->setDateCreationPatient(new \DateTime());
        // $patient->setRoles(['Patient']);
        $form = $this->createForm(PatientType::class, $patient); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
$textPassword=$patient->getPassword();
$hashedPassword=$passwordHasher->hashPassword($patient,$textPassword);
$patient->setPassword($hashedPassword);
$patient->setRoles(['ROLE_PATIENT']); 
            $entityManager->persist($patient);
            $entityManager->flush();
 
            return $this->redirectToRoute('app_home');
        }
        return $this->render('patient/index.html.twig', [
            'form' => $form->createView(), 
        ]);
    }
    #[Route('/patient/profil', name: 'app_patient_profil')]
    public function profilPatient(Request $request, EntityManagerInterface $entityManager): Response
    {
        $patientId = $this->getUser()->getId();
        $patient = $entityManager->getRepository(Patient::class)->find($patientId);

        if (!$patient) {
            throw $this->createNotFoundException('Patient non trouvé');
        }
       
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

           
            return $this->redirectToRoute('/');
        }

        return $this->render('patient/profil.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}