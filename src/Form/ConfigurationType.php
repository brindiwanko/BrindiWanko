<?php

namespace App\Form;

use App\Entity\Configuration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gameName')
            ->add('presentation')
            ->add('maxLevel')
            ->add('experience')
            ->add('skillPoint')
            ->add('experienceBonus')
            ->add('goldBonus')
            ->add('dropBonus')
            ->add('access')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Configuration::class,
        ]);
    }
}
