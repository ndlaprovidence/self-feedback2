<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PageVisitorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $choise = [
            '★1' => '1',
            '★2' => '2',
            '★3' => '3',
            '★4' => '4',
            '★5' => '5',
        ];
        $builder
            ->add()
            ->add('gout'
                , ChoiceType::class, [
                    'label'=>'Goût du plat',
                    'attr' => ['class' => 'star-ratings-input'],
                    
                    'attr' => ['class' => 'stars'],
                    
                    'choices' => $choise,

                    'expanded' => true,
                    'multiple' => false,

                ])
            ->add('diversite'
                , ChoiceType::class, [

                    'choices' => $choise,

                    'expanded' => true,
                    'multiple' => false,

                ])
            ->add('chaleur'
                , ChoiceType::class, [

                    'choices' => $choise,
                    'expanded' => true,
                    'multiple' => false,

                ])
            ->add('disponibilite'
                , ChoiceType::class, [

                    'choices' => $choise,
                    'expanded' => true,
                    'multiple' => false,

                ])
            ->add('proprete'
                , ChoiceType::class, [

                    'choices' => $choise,
                    'expanded' => true,
                    'multiple' => false,

                ])

            ->add('acceuil', ChoiceType::class, [

                'choices' => $choise,
                'expanded' => true,
                'multiple' => false,

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
