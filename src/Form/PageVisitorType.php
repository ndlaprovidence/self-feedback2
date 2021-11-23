<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class PageVisitorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $choise =[
            '★1' => '1',
            '★2' => '2',
            '★3' => '3',
            '★4' => '4',
            '★5' => '5'
        ];
        $builder
            ->add('gout'
            , ChoiceType::class,[
                
                'choices' => $choise

            ])
            ->add('diversite'
            , ChoiceType::class,[
                
                'choices' => $choise

            ])
            ->add('chaleur'
            , ChoiceType::class,[
                
                'choices' => $choise

            ])
            ->add('disponibilite'
            , ChoiceType::class,[
                
                'choices' => $choise

            ])
            ->add('proprete'
            , ChoiceType::class,[
                
                'choices' => $choise

            ])
            ->add('acceuil'
            , ChoiceType::class,[
                
                'choices' => $choise

            ])
            ->add('commentaire')
            ->add('save', SubmitType::class) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
