<?php

namespace App\Form;

use App\Entity\QuestionDepistage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DepistageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q1', RangeType::class, [
                'attr'=>[
                    'min' => 0,
                    'max' => 10
                ]
            ])
            ->add('q2', ChoiceType::class,[
                'choices' =>  [
                    'Oui' => true,
                    'Non' => false],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('q3', ChoiceType::class,[
                'choices' =>  [
                    'Oui' => true,
                    'Non' => false],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('q4', NumberType::class, [
                'html5'=>true
            ])
            ->add('q5', ChoiceType::class,[
                'choices' =>  [
                    'Oui' => true,
                    'Non' => false],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('q6', ChoiceType::class,[
                'choices' =>  [
                    'Oui' => true,
                    'Non' => false],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('q7', NumberType::class, [
                'html5'=>true
            ])
            ->add('q8', ChoiceType::class,[
                'choices' =>  [
                    'Oui' => true,
                    'Non' => false],
                'multiple'=>false,
                'expanded'=>true,
            ])
            ->add('send', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QuestionDepistage::class,
        ]);
    }
}
