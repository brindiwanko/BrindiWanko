<?php

namespace App\Form;

use App\Entity\Monster;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonsterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('picture')
            ->add('name')
            ->add('description')
            ->add('level')
            ->add('hp')
            ->add('mp')
            ->add('strength')
            ->add('magic')
            ->add('agility')
            ->add('defense')
            ->add('defenseMagic')
            ->add('eperience')
            ->add('gold')
            ->add('limited')
            ->add('quantity')
            ->add('quantityBattle')
            ->add('quantityEscaped')
            ->add('quantityVictory')
            ->add('quantityDefeated')
            ->add('quantityDraw')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Monster::class,
        ]);
    }
}
