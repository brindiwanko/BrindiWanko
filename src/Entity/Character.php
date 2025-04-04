<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: "car_characters")]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "characterId")]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $picture = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?int $sex = null;

    #[ORM\Column]
    private ?int $hpMin = null;

    #[ORM\Column]
    private ?int $hpMax = null;

    #[ORM\Column]
    private ?int $hpSkillPoints = null;

    #[ORM\Column]
    private ?int $hpBonus = null;

    #[ORM\Column]
    private ?int $hpEquipments = null;

    #[ORM\Column]
    private ?int $hpGuild = null;

    #[ORM\Column]
    private ?int $hpTotal = null;

    #[ORM\Column]
    private ?int $mpMin = null;

    #[ORM\Column]
    private ?int $mpMax = null;

    #[ORM\Column]
    private ?int $mpSkillPoints = null;

    #[ORM\Column]
    private ?int $mpBonus = null;

    #[ORM\Column]
    private ?int $mpEquipments = null;

    #[ORM\Column]
    private ?int $mpGuild = null;

    #[ORM\Column]
    private ?int $mpTotal = null;

    #[ORM\Column]
    private ?int $strength = null;

    #[ORM\Column]
    private ?int $strengthSkillPoints = null;

    #[ORM\Column]
    private ?int $strengthBonus = null;

    #[ORM\Column]
    private ?int $strengthEquipments = null;

    #[ORM\Column]
    private ?int $strengthGuild = null;

    #[ORM\Column]
    private ?int $strengthTotal = null;

    #[ORM\Column]
    private ?int $magic = null;

    #[ORM\Column]
    private ?int $magicSkillPoints = null;

    #[ORM\Column]
    private ?int $magicBonus = null;

    #[ORM\Column]
    private ?int $magicEquipments = null;

    #[ORM\Column]
    private ?int $magicGuild = null;

    #[ORM\Column]
    private ?int $magicTotal = null;

    #[ORM\Column]
    private ?int $agility = null;

    #[ORM\Column]
    private ?int $agilitySkillPoints = null;

    #[ORM\Column]
    private ?int $agilityBonus = null;

    #[ORM\Column]
    private ?int $agilityEquipments = null;

    #[ORM\Column]
    private ?int $agilityGuild = null;

    #[ORM\Column]
    private ?int $agilityTotal = null;

    #[ORM\Column]
    private ?int $defense = null;

    #[ORM\Column]
    private ?int $defenseSkillPoints = null;

    #[ORM\Column]
    private ?int $defenseBonus = null;

    #[ORM\Column]
    private ?int $defenseEquipments = null;

    #[ORM\Column]
    private ?int $defenseGuild = null;

    #[ORM\Column]
    private ?int $defenseTotal = null;

    #[ORM\Column]
    private ?int $defenseMagic = null;

    #[ORM\Column]
    private ?int $defenseMagicSkillPoints = null;

    #[ORM\Column]
    private ?int $defenseMagicBonus = null;

    #[ORM\Column]
    private ?int $defenseMagicEquipments = null;

    #[ORM\Column]
    private ?int $defenseMagicGuild = null;

    #[ORM\Column]
    private ?int $defenseMagicTotal = null;

    #[ORM\Column]
    private ?int $wisdom = null;

    #[ORM\Column]
    private ?int $wisdomSkillPoints = null;

    #[ORM\Column]
    private ?int $wisdomBonus = null;

    #[ORM\Column]
    private ?int $wisdomEquipments = null;

    #[ORM\Column]
    private ?int $wisdomGuild = null;

    #[ORM\Column]
    private ?int $wisdomTotal = null;

    #[ORM\Column]
    private ?int $prospecting = null;

    #[ORM\Column]
    private ?int $prospectingSkillPoints = null;

    #[ORM\Column]
    private ?int $prospectingBonus = null;

    #[ORM\Column]
    private ?int $prospectingEquipments = null;

    #[ORM\Column]
    private ?int $prospectingGuild = null;

    #[ORM\Column]
    private ?int $prospectingTotal = null;

    #[ORM\Column]
    private ?int $arenaDefeate = null;

    #[ORM\Column]
    private ?int $arenaVictory = null;

    #[ORM\Column]
    private ?int $experience = null;

    #[ORM\Column]
    private ?int $experienceTotal = null;

    #[ORM\Column]
    private ?int $skillPoints = null;

    #[ORM\Column]
    private ?int $gold = null;

    #[ORM\Column]
    private ?int $chapter = null;

    #[ORM\Column]
    private ?int $onBattle = null;

    #[ORM\Column]
    private ?int $enable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getSex(): ?int
    {
        return $this->sex;
    }

    public function setSex(int $sex): static
    {
        $this->sex = $sex;

        return $this;
    }

    public function getHpMin(): ?int
    {
        return $this->hpMin;
    }

    public function setHpMin(int $hpMin): static
    {
        $this->hpMin = $hpMin;

        return $this;
    }

    public function getHpMax(): ?int
    {
        return $this->hpMax;
    }

    public function setHpMax(int $hpMax): static
    {
        $this->hpMax = $hpMax;

        return $this;
    }

    public function getHpSkillPoints(): ?int
    {
        return $this->hpSkillPoints;
    }

    public function setHpSkillPoints(int $hpSkillPoints): static
    {
        $this->hpSkillPoints = $hpSkillPoints;

        return $this;
    }

    public function getHpBonus(): ?int
    {
        return $this->hpBonus;
    }

    public function setHpBonus(int $hpBonus): static
    {
        $this->hpBonus = $hpBonus;

        return $this;
    }

    public function getHpEquipments(): ?int
    {
        return $this->hpEquipments;
    }

    public function setHpEquipments(int $hpEquipments): static
    {
        $this->hpEquipments = $hpEquipments;

        return $this;
    }

    public function getHpGuild(): ?int
    {
        return $this->hpGuild;
    }

    public function setHpGuild(int $hpGuild): static
    {
        $this->hpGuild = $hpGuild;

        return $this;
    }

    public function getHpTotal(): ?int
    {
        return $this->hpTotal;
    }

    public function setHpTotal(int $hpTotal): static
    {
        $this->hpTotal = $hpTotal;

        return $this;
    }

    public function getMpMin(): ?int
    {
        return $this->mpMin;
    }

    public function setMpMin(int $mpMin): static
    {
        $this->mpMin = $mpMin;

        return $this;
    }

    public function getMpMax(): ?int
    {
        return $this->mpMax;
    }

    public function setMpMax(int $mpMax): static
    {
        $this->mpMax = $mpMax;

        return $this;
    }

    public function getMpSkillPoints(): ?int
    {
        return $this->mpSkillPoints;
    }

    public function setMpSkillPoints(int $mpSkillPoints): static
    {
        $this->mpSkillPoints = $mpSkillPoints;

        return $this;
    }

    public function getMpBonus(): ?int
    {
        return $this->mpBonus;
    }

    public function setMpBonus(int $mpBonus): static
    {
        $this->mpBonus = $mpBonus;

        return $this;
    }

    public function getMpEquipments(): ?int
    {
        return $this->mpEquipments;
    }

    public function setMpEquipments(int $mpEquipments): static
    {
        $this->mpEquipments = $mpEquipments;

        return $this;
    }

    public function getMpGuild(): ?int
    {
        return $this->mpGuild;
    }

    public function setMpGuild(int $mpGuild): static
    {
        $this->mpGuild = $mpGuild;

        return $this;
    }

    public function getMpTotal(): ?int
    {
        return $this->mpTotal;
    }

    public function setMpTotal(int $mpTotal): static
    {
        $this->mpTotal = $mpTotal;

        return $this;
    }

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): static
    {
        $this->strength = $strength;

        return $this;
    }

    public function getStrengthSkillPoints(): ?int
    {
        return $this->strengthSkillPoints;
    }

    public function setStrengthSkillPoints(int $strengthSkillPoints): static
    {
        $this->strengthSkillPoints = $strengthSkillPoints;

        return $this;
    }

    public function getStrengthBonus(): ?int
    {
        return $this->strengthBonus;
    }

    public function setStrengthBonus(int $strengthBonus): static
    {
        $this->strengthBonus = $strengthBonus;

        return $this;
    }

    public function getStrengthEquipments(): ?int
    {
        return $this->strengthEquipments;
    }

    public function setStrengthEquipments(int $strengthEquipments): static
    {
        $this->strengthEquipments = $strengthEquipments;

        return $this;
    }

    public function getStrengthGuild(): ?int
    {
        return $this->strengthGuild;
    }

    public function setStrengthGuild(int $strengthGuild): static
    {
        $this->strengthGuild = $strengthGuild;

        return $this;
    }

    public function getStrengthTotal(): ?int
    {
        return $this->strengthTotal;
    }

    public function setStrengthTotal(int $strengthTotal): static
    {
        $this->strengthTotal = $strengthTotal;

        return $this;
    }

    public function getMagic(): ?int
    {
        return $this->magic;
    }

    public function setMagic(int $magic): static
    {
        $this->magic = $magic;

        return $this;
    }

    public function getMagicSkillPoints(): ?int
    {
        return $this->magicSkillPoints;
    }

    public function setMagicSkillPoints(int $magicSkillPoints): static
    {
        $this->magicSkillPoints = $magicSkillPoints;

        return $this;
    }

    public function getMagicBonus(): ?int
    {
        return $this->magicBonus;
    }

    public function setMagicBonus(int $magicBonus): static
    {
        $this->magicBonus = $magicBonus;

        return $this;
    }

    public function getMagicEquipments(): ?int
    {
        return $this->magicEquipments;
    }

    public function setMagicEquipments(int $magicEquipments): static
    {
        $this->magicEquipments = $magicEquipments;

        return $this;
    }

    public function getMagicGuild(): ?int
    {
        return $this->magicGuild;
    }

    public function setMagicGuild(int $magicGuild): static
    {
        $this->magicGuild = $magicGuild;

        return $this;
    }

    public function getMagicTotal(): ?int
    {
        return $this->magicTotal;
    }

    public function setMagicTotal(int $magicTotal): static
    {
        $this->magicTotal = $magicTotal;

        return $this;
    }

    public function getAgility(): ?int
    {
        return $this->agility;
    }

    public function setAgility(int $agility): static
    {
        $this->agility = $agility;

        return $this;
    }

    public function getAgilitySkillPoints(): ?int
    {
        return $this->agilitySkillPoints;
    }

    public function setAgilitySkillPoints(int $agilitySkillPoints): static
    {
        $this->agilitySkillPoints = $agilitySkillPoints;

        return $this;
    }

    public function getAgilityBonus(): ?int
    {
        return $this->agilityBonus;
    }

    public function setAgilityBonus(int $agilityBonus): static
    {
        $this->agilityBonus = $agilityBonus;

        return $this;
    }

    public function getAgilityEquipments(): ?int
    {
        return $this->agilityEquipments;
    }

    public function setAgilityEquipments(int $agilityEquipments): static
    {
        $this->agilityEquipments = $agilityEquipments;

        return $this;
    }

    public function getAgilityGuild(): ?int
    {
        return $this->agilityGuild;
    }

    public function setAgilityGuild(int $agilityGuild): static
    {
        $this->agilityGuild = $agilityGuild;

        return $this;
    }

    public function getAgilityTotal(): ?int
    {
        return $this->agilityTotal;
    }

    public function setAgilityTotal(int $agilityTotal): static
    {
        $this->agilityTotal = $agilityTotal;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): static
    {
        $this->defense = $defense;

        return $this;
    }

    public function getDefenseSkillPoints(): ?int
    {
        return $this->defenseSkillPoints;
    }

    public function setDefenseSkillPoints(int $defenseSkillPoints): static
    {
        $this->defenseSkillPoints = $defenseSkillPoints;

        return $this;
    }

    public function getDefenseBonus(): ?int
    {
        return $this->defenseBonus;
    }

    public function setDefenseBonus(int $defenseBonus): static
    {
        $this->defenseBonus = $defenseBonus;

        return $this;
    }

    public function getDefenseEquipments(): ?int
    {
        return $this->defenseEquipments;
    }

    public function setDefenseEquipments(int $defenseEquipments): static
    {
        $this->defenseEquipments = $defenseEquipments;

        return $this;
    }

    public function getDefenseGuild(): ?int
    {
        return $this->defenseGuild;
    }

    public function setDefenseGuild(int $defenseGuild): static
    {
        $this->defenseGuild = $defenseGuild;

        return $this;
    }

    public function getDefenseTotal(): ?int
    {
        return $this->defenseTotal;
    }

    public function setDefenseTotal(int $defenseTotal): static
    {
        $this->defenseTotal = $defenseTotal;

        return $this;
    }

    public function getDefenseMagic(): ?int
    {
        return $this->defenseMagic;
    }

    public function setDefenseMagic(int $defenseMagic): static
    {
        $this->defenseMagic = $defenseMagic;

        return $this;
    }

    public function getDefenseMagicSkillPoints(): ?int
    {
        return $this->defenseMagicSkillPoints;
    }

    public function setDefenseMagicSkillPoints(int $defenseMagicSkillPoints): static
    {
        $this->defenseMagicSkillPoints = $defenseMagicSkillPoints;

        return $this;
    }

    public function getDefenseMagicBonus(): ?int
    {
        return $this->defenseMagicBonus;
    }

    public function setDefenseMagicBonus(int $defenseMagicBonus): static
    {
        $this->defenseMagicBonus = $defenseMagicBonus;

        return $this;
    }

    public function getDefenseMagicEquipments(): ?int
    {
        return $this->defenseMagicEquipments;
    }

    public function setDefenseMagicEquipments(int $defenseMagicEquipments): static
    {
        $this->defenseMagicEquipments = $defenseMagicEquipments;

        return $this;
    }

    public function getDefenseMagicGuild(): ?int
    {
        return $this->defenseMagicGuild;
    }

    public function setDefenseMagicGuild(int $defenseMagicGuild): static
    {
        $this->defenseMagicGuild = $defenseMagicGuild;

        return $this;
    }

    public function getDefenseMagicTotal(): ?int
    {
        return $this->defenseMagicTotal;
    }

    public function setDefenseMagicTotal(int $defenseMagicTotal): static
    {
        $this->defenseMagicTotal = $defenseMagicTotal;

        return $this;
    }

    public function getWisdom(): ?int
    {
        return $this->wisdom;
    }

    public function setWisdom(int $wisdom): static
    {
        $this->wisdom = $wisdom;

        return $this;
    }

    public function getWisdomSkillPoints(): ?int
    {
        return $this->wisdomSkillPoints;
    }

    public function setWisdomSkillPoints(int $wisdomSkillPoints): static
    {
        $this->wisdomSkillPoints = $wisdomSkillPoints;

        return $this;
    }

    public function getWisdomBonus(): ?int
    {
        return $this->wisdomBonus;
    }

    public function setWisdomBonus(int $wisdomBonus): static
    {
        $this->wisdomBonus = $wisdomBonus;

        return $this;
    }

    public function getWisdomEquipments(): ?int
    {
        return $this->wisdomEquipments;
    }

    public function setWisdomEquipments(int $wisdomEquipments): static
    {
        $this->wisdomEquipments = $wisdomEquipments;

        return $this;
    }

    public function getWisdomGuild(): ?int
    {
        return $this->wisdomGuild;
    }

    public function setWisdomGuild(int $wisdomGuild): static
    {
        $this->wisdomGuild = $wisdomGuild;

        return $this;
    }

    public function getWisdomTotal(): ?int
    {
        return $this->wisdomTotal;
    }

    public function setWisdomTotal(int $wisdomTotal): static
    {
        $this->wisdomTotal = $wisdomTotal;

        return $this;
    }

    public function getProspecting(): ?int
    {
        return $this->prospecting;
    }

    public function setProspecting(int $prospecting): static
    {
        $this->prospecting = $prospecting;

        return $this;
    }

    public function getProspectingSkillPoints(): ?int
    {
        return $this->prospectingSkillPoints;
    }

    public function setProspectingSkillPoints(int $prospectingSkillPoints): static
    {
        $this->prospectingSkillPoints = $prospectingSkillPoints;

        return $this;
    }

    public function getProspectingBonus(): ?int
    {
        return $this->prospectingBonus;
    }

    public function setProspectingBonus(int $prospectingBonus): static
    {
        $this->prospectingBonus = $prospectingBonus;

        return $this;
    }

    public function getProspectingEquipments(): ?int
    {
        return $this->prospectingEquipments;
    }

    public function setProspectingEquipments(int $prospectingEquipments): static
    {
        $this->prospectingEquipments = $prospectingEquipments;

        return $this;
    }

    public function getProspectingGuild(): ?int
    {
        return $this->prospectingGuild;
    }

    public function setProspectingGuild(int $prospectingGuild): static
    {
        $this->prospectingGuild = $prospectingGuild;

        return $this;
    }

    public function getProspectingTotal(): ?int
    {
        return $this->prospectingTotal;
    }

    public function setProspectingTotal(int $prospectingTotal): static
    {
        $this->prospectingTotal = $prospectingTotal;

        return $this;
    }

    public function getArenaDefeate(): ?int
    {
        return $this->arenaDefeate;
    }

    public function setArenaDefeate(int $arenaDefeate): static
    {
        $this->arenaDefeate = $arenaDefeate;

        return $this;
    }

    public function getArenaVictory(): ?int
    {
        return $this->arenaVictory;
    }

    public function setArenaVictory(int $arenaVictory): static
    {
        $this->arenaVictory = $arenaVictory;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function getExperienceTotal(): ?int
    {
        return $this->experienceTotal;
    }

    public function setExperienceTotal(int $experienceTotal): static
    {
        $this->experienceTotal = $experienceTotal;

        return $this;
    }

    public function getSkillPoints(): ?int
    {
        return $this->skillPoints;
    }

    public function setSkillPoints(int $skillPoints): static
    {
        $this->skillPoints = $skillPoints;

        return $this;
    }

    public function getGold(): ?int
    {
        return $this->gold;
    }

    public function setGold(int $gold): static
    {
        $this->gold = $gold;

        return $this;
    }

    public function getChapter(): ?int
    {
        return $this->chapter;
    }

    public function setChapter(int $chapter): static
    {
        $this->chapter = $chapter;

        return $this;
    }

    public function getOnBattle(): ?int
    {
        return $this->onBattle;
    }

    public function setOnBattle(int $onBattle): static
    {
        $this->onBattle = $onBattle;

        return $this;
    }

    public function getEnable(): ?int
    {
        return $this->enable;
    }

    public function setEnable(int $enable): static
    {
        $this->enable = $enable;

        return $this;
    }
}