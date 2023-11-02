<?php

namespace App\Form;

use App\Entity\Movie;
use App\Entity\MovieAccess;
use App\Entity\Subscription;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('link')
            ->add('movieAccesses', EntityType::class, [
                'class' => MovieAccess::class,
                'choice_label' => 'subscription.name',
                'label' => 'Abonnement',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('authorizedAccess', ChoiceType::class, [
                'label' => 'Accès',
                'attr' => [
                    'class' => 'text-black w-1/3 flex flex-col m-auto rounded-sm',
                ],
                'choices' => [
                    'Gratuit' => true,
                    'Premium' => false,
                ],
                'mapped' => false,
            ])
        ->add('save', SubmitType::class, [
        'label' => 'Ajouter la vidéo',
        'attr' => [
            'class' => 'w-1/2 text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-2.5 text-center m-auto my-2',
        ],
         ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
