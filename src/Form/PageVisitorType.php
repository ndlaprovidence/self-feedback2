<?php

namespace App\Form;

use App\Entity\Avis;
use App\Entity\TypesRepas;
use App\Entity\TypesUtilisateurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PageVisitorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    { 
        // $choise = [
        //     'Etudiant' => '1',
        //     'Terminale' => '2',
        //     'Premiere' => '3',
        //     'Seconde' => '4',
        //     'Troisieme' => '5',
        //     'Personnel' => '6',
        // ];
        // $builder
        //     ->add('Classe'
        //         , ChoiceType::class, [
        //             'choices' => $choise,
        //         ]);
        $builder->add('user_type', EntityType::class, [
            'class' => TypesUtilisateurs::class,
            'choice_label' => 'libelle_t',           
        ])
        ->add('repas_type', EntityType::class, [
            'class' => TypesRepas::class,
            'choice_label' => 'libelle_r',
        ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypesUtilisateurs::class,
        ]);
    }
}
