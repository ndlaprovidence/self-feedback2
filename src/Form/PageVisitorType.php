<?php

namespace App\Form;

use App\Entity\Avis;
use App\Entity\TypesUtilisateurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PageVisitorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    { 
        $choise = [
            'Etudiant' => 'Etudiant',
            'Terminale' => 'Terminale',
            'Premiere' => 'v',
            'Seconde' => 'h',
            'Troisieme' => 'aaa',
        ];
        $builder
            ->add('libelle_t'
                , ChoiceType::class, [
                    'choices' => $choise,
                ])
            
  
                ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypesUtilisateurs::class,
        ]);
    }
}
