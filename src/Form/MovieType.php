<?php

namespace App\Form;

use App\Entity\Movie;
use App\Entity\MovieAccess;
use App\Entity\Subscription;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
                'choices' => [
                    'Gratuit' => true,
                    'Premium' => false,
                ],
                'mapped' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
