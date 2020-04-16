<?php

namespace App\Form;

use App\Entity\QuestionDepistage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class DepistageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q1', NumberType::class, [
                'html5'=>true
            ])
            ->add('q2')
            ->add('q3')
            ->add('q4', NumberType::class, [
                'html5'=>true
            ])
            ->add('q5')
            ->add('q6')
            ->add('q7', NumberType::class, [
                'html5'=>true
            ])
            ->add('q8')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QuestionDepistage::class,
        ]);
    }
}
