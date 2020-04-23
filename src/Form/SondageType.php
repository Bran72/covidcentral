<?php

namespace App\Form;

use App\Entity\QuestionSondage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;


class SondageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q1', ChoiceType::class,[
                'choices' =>  [
                    'Oui' => true,
                    'Non' => false,],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('q2', ChoiceType::class, [
                'placeholder' => 'Choisi une option',
                'choices'  => [
                    'oui, au chômage technique' => 'oui, au chômage technique',
                    'oui, au chômage partiel' => 'oui, au chômage partiel',
                    'non, horaire pleine' => 'non, horaire pleine',
                ],
            ])
            ->add('q3', NumberType::class, [
                'html5'=>true,
                'attr' => ['placeholder' => 'Entrez un chiffre']
            ])
            ->add('q4', ChoiceType::class, [
                'placeholder' => 'Choisi une option',
                'choices'  => [
                    'Pour les courses' => 'Pour les courses',
                    'Pour le travail' => 'Pour le travail',
                    'Pour le sport' => 'Pour le sport',
                ],
            ])
            ->add('q5', ChoiceType::class, [
                'placeholder' => 'Choisi une option',
                'choices'  => [
                    '1 fois par semaine' => '1 fois par semaine',
                    '2 à 3 fois par semaine' => '2 à 3 fois par semaine',
                    '+5 fois par semaine' => '+5 fois par semaine',
                ],
            ])
            ->add('q6', ChoiceType::class, [
                'placeholder' => 'Choisi une option',
                'choices'  => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('q7', ChoiceType::class, [
                'placeholder' => 'Choisi une option',
                'choices'  => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('q8', ChoiceType::class, [
                'placeholder' => 'Choisi une option',
                'choices'  => [
                    'Par les réseaux sociaux' => 'Par les réseaux sociaux',
                    'Par le journal télévisé' => 'Par le journal télévisé',
                    'Par les articles le covid-19' => 'Par les articles le covid-19',
                    'Autre' => 'Autre',
                ],
            ])
            ->add('q9', ChoiceType::class, [
                'placeholder' => 'Choisi une option',
                'choices'  => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('q10', NumberType::class, [
                'html5'=>true,
                'attr' => ['placeholder' => 'Entrez un chiffre']
            ])
            ->add('q12', ChoiceType::class, [
                'placeholder' => 'Choisi une option',
                'choices'  => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('q11', ChoiceType::class, [
                'placeholder' => 'Choisi une option',
                'choices'  => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('send', SubmitType::class, [
                'label' => 'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QuestionSondage::class,
        ]);
    }
}
