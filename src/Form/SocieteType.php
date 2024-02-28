<?php

namespace App\Form;

use App\Entity\Societe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('siret', TextType::class, [
                'label' => 'Nom de la Société',
                'attr' => ['class' => 'form-control']
            ])
            // ->add('roles')
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['class' => 'form-control']
            ])
            ->add('nom_societe', TextType::class, [
                'label' => 'Nom de la Société',
                'attr' => ['class' => 'form-control']
            ])
            ->add('profession_societe', ChoiceType::class, [
                'label' => 'Profession',
                'choices' => [
                    'Choisissez...' => null,
                    'Vétérinaire' => 'Vétérinaire',
                    'Toiletteur' => 'Toiletteur',
                ],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('nom_dirigeant', TextType::class, [
                'label' => 'Nom du dirigeant',
                'attr' => ['class' => 'form-control']
            ])
            ->add('adresse_societe', TextType::class, [
                'label' => 'Adresse',
                'attr' => ['class' => 'form-control']
            ])
            ->add('complement_adresse_societe', TextType::class, [ 
                'label' => 'Complement Adresse',
                'attr' => ['class' => 'form-control'],
                'required' => false,
            ])
            ->add('code_postal_societe', TextType::class, [
                'label' => 'Code Postal',
                'attr' => ['class' => 'form-control']
            ])
            ->add('ville_societe', TextType::class, [
                'label' => 'Ville',
                'attr' => ['class' => 'form-control']
            ])
            ->add('telephone_societe', TelType::class, [
                'label' => 'Telephone de la Société',
                'attr' => ['class' => 'form-control']
            ])
            ->add('telephone_dirigeant', TelType::class, [
                'label' => 'Telephone du Dirigeant',
                'attr' => ['class' => 'form-control']
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'form-control']
            ])
            ->add('images', TextType::class, [
                'label' => 'images',
                'attr' => ['class' => 'form-control'],
                'required' => false,
            ])
            ->add('date_creation_societe', DateType::class, [
                'label' => 'Date de création',
                // 'data' => new \DateTime(), 
                // 'disabled' => true, 
            ])
            ->add('date_resiliation_societe')
            ->add('date_validation_societe')
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => ['id' => 'save-button', 'class' => 'btn btn-lg btn-primary'] 
            ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
