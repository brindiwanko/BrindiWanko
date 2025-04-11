<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('picture')
            ->add('name')
            ->add('level')
            ->add('sex')
            ->add('hpMin')
            ->add('hpMax')
            ->add('hpSkillPoints')
            ->add('hpBonus')
            ->add('hpEquipments')
            ->add('hpGuild')
            ->add('hpTotal')
            ->add('mpMin')
            ->add('mpMax')
            ->add('mpSkillPoints')
            ->add('mpBonus')
            ->add('mpEquipments')
            ->add('mpGuild')
            ->add('mpTotal')
            ->add('strength')
            ->add('strengthSkillPoints')
            ->add('strengthBonus')
            ->add('strengthEquipments')
            ->add('strengthGuild')
            ->add('strengthTotal')
            ->add('magic')
            ->add('magicSkillPoints')
            ->add('magicBonus')
            ->add('magicEquipments')
            ->add('magicGuild')
            ->add('magicTotal')
            ->add('agility')
            ->add('agilitySkillPoints')
            ->add('agilityBonus')
            ->add('agilityEquipments')
            ->add('agilityGuild')
            ->add('agilityTotal')
            ->add('defense')
            ->add('defenseSkillPoints')
            ->add('defenseBonus')
            ->add('defenseEquipments')
            ->add('defenseGuild')
            ->add('defenseTotal')
            ->add('defenseMagic')
            ->add('defenseMagicSkillPoints')
            ->add('defenseMagicBonus')
            ->add('defenseMagicEquipments')
            ->add('defenseMagicGuild')
            ->add('defenseMagicTotal')
            ->add('wisdom')
            ->add('wisdomSkillPoints')
            ->add('wisdomBonus')
            ->add('wisdomEquipments')
            ->add('wisdomGuild')
            ->add('wisdomTotal')
            ->add('prospecting')
            ->add('prospectingSkillPoints')
            ->add('prospectingBonus')
            ->add('prospectingEquipments')
            ->add('prospectingGuild')
            ->add('prospectingTotal')
            ->add('arenaDefeate')
            ->add('arenaVictory')
            ->add('experience')
            ->add('experienceTotal')
            ->add('skillPoints')
            ->add('gold')
            ->add('chapter')
            ->add('onBattle')
            ->add('enable')
            ->add('user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Character::class,
        ]);
    }
}
