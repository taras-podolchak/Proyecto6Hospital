<?php

namespace App\Form;

use App\Entity\Enfermo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnfermoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('apellido')
            ->add('direccion')
            ->add('fechaNac')
            ->add('sexo')
            ->add('nss')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Enfermo::class,
        ]);
    }
}
