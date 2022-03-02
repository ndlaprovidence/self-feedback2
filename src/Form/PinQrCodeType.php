<?php

namespace App\Form;

use App\Entity\PinQRcode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PinQrCodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pin',IntegerType::class, [
                'attr' => ['class' => 'form-control',
            'placeholder' => "Code PIN"],
            ])
        ;
        $builder
        ->add('submit',SubmitType::class, [
            'attr' => ['class' => 'btn btn-primary',
        ]])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PinQRcode::class,
        ]);
    }
}
