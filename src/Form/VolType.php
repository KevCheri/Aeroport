<?php

namespace App\Form;

use App\Entity\Vol;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DateDepart')
            ->add('DateArrivee')
            ->add('VilleDepart')
            ->add('VilleArrivee')
            ->add('gestionnaire')
            ->add('avion')
            ->add('pilote')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vol::class,
        ]);
    }
}
