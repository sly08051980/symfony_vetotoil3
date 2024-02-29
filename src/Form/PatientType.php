<?php

namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'form-control']
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['class' => 'form-control']
            ])
            ->add('nom_patient', TextType::class, [
                'label' => 'Nom',
                'attr' => ['class' => 'form-control']
            ])
            ->add('prenom_patient', TextType::class, [ 
                'label' => 'Prénom',
                'attr' => ['class' => 'form-control']
            ])
            ->add('adresse_patient', TextType::class, [ 
                'label' => 'Adresse',
                'attr' => ['class' => 'form-control']
            ])
            ->add('complement_adresse_patient', TextType::class, [ 
                'label' => 'Complement Adresse',
                'attr' => ['class' => 'form-control'],
                'required' => false,
            ])
            ->add('code_postal_patient', TextType::class, [
                'label' => 'Code Postal',
                'attr' => ['class' => 'form-control']
            ])
            ->add('ville_patient', TextType::class, [ 
                'label' => 'Ville',
                'attr' => ['class' => 'form-control']
            ])
            ->add('telephone_patient', TelType::class, [
                'label' => 'Telephone',
                'attr' => ['class' => 'form-control']
            ])
            ->add('date_creation_patient', DateType::class, [
                'label' => 'Date de création',
                'widget' => 'single_text',
                // 'data' => new \DateTime(), 
                // 'disabled' => true, 
            ])
            ->add('date_fin_patient')
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => ['id' => 'save-button', 'class' => 'btn btn-lg btn-primary'] 
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
