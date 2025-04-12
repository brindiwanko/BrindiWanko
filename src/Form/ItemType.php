<?php

namespace App\Form;

use App\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('picture')
            ->add('name')
            ->add('description')
            ->add('level')
            ->add('levelRequired')
            ->add('hpEffect')
            ->add('mpEffect')
            ->add('strengthEffect')
            ->add('magicEffect')
            ->add('agilityEffect')
            ->add('defenseEffect')
            ->add('defenseMagicEffect')
            ->add('wisdomEffect')
            ->add('prospectingEffect')
            ->add('purchasePrice')
            ->add('salePrice')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
