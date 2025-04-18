<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('picture')
            ->add('name')
            ->add('description')
            ->add('hpBonus')
            ->add('mpBonus')
            ->add('strengthBonus')
            ->add('magicBonus')
            ->add('agilityBonus')
            ->add('defenseBonus')
            ->add('defenseMagicBonus')
            ->add('wisdomBonus')
            ->add('prospectingBonus')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
