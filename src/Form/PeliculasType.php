<?php

namespace App\Form;

use App\Entity\Peliculas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PeliculasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('iddistribuidor')
            ->add('idgenero')
            ->add('titulo')
            ->add('idnacionalidad')
            ->add('argumento')
            ->add('foto')
            ->add('fechaEstreno')
            ->add('actores')
            ->add('director')
            ->add('duracion')
            ->add('precio')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Peliculas::class,
        ]);
    }
}
