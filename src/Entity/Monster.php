<?php

namespace App\Entity;

use App\Repository\MonsterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
#[ORM\Table(name: "bw_monsters")]
class Monster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "monsterId")]
    private ?int $monsterId = null;

    #[ORM\Column(length: 50)]
    private ?string $monsterPicture = null;

    #[ORM\Column(length: 30)]
    private ?string $monsterName = null;

    #[ORM\Column(type: 'text')]
    private ?string $monsterDescription = null;

    #[ORM\Column]
    private ?int $monsterLevel = null;

    #[ORM\Column]
    private ?int $monsterHp = null;

    #[ORM\Column]
    private ?int $monsterMp = null;

    #[ORM\Column]
    private ?int $monsterStrength = null;

    #[ORM\Column]
    private ?int $monsterMagic = null;

    #[ORM\Column]
    private ?int $monsterAgility = null;

    #[ORM\Column]
    private ?int $monsterDefense = null;

    #[ORM\Column]
    private ?int $monsterDefenseMagic = null;

    #[ORM\Column]
    private ?int $monsterExperience = null;

    #[ORM\Column]
    private ?int $monsterGold = null;

    #[ORM\Column(length: 30)]
    private ?int $monsterLimited = null;

    #[ORM\Column]
    private ?int $monsterQuantity = null;

    #[ORM\Column]
    private ?int $monsterQuantityBattle = null;

    #[ORM\Column]
    private ?int $monsterQuantityEscaped = null;

    #[ORM\Column]
    private ?int $monsterQuantityVictory = null;

    #[ORM\Column]
    private ?int $monsterQuantityDefeated = null;

    #[ORM\Column]
    private ?int $monsterQuantityDraw = null;

    public function getMonsterId(): ?int
    {
        return $this->monsterId;
    }

    public function getMonsterPicture(): ?string
    {
        return $this->monsterPicture;
    }

    public function setMonsterPicture(string $monsterPicture): static
    {
        $this->monsterPicture = $monsterPicture;

        return $this;
    }

    public function getMonsterName(): ?string
    {
        return $this->monsterName;
    }

    public function setMonsterName(string $monsterName): static
    {
        $this->monsterName = $monsterName;

        return $this;
    }

    public function getMonsterDescription(): ?string
    {
        return $this->monsterDescription;
    }

    public function setMonsterDescription(string $monsterDescription): static
    {
        $this->monsterDescription = $monsterDescription;

        return $this;
    }

    public function getMonsterLevel(): ?int
    {
        return $this->monsterLevel;
    }

    public function setMonsterLevel(int $monsterLevel): static
    {
        $this->monsterLevel = $monsterLevel;

        return $this;
    }

    public function getMonsterHp(): ?int
    {
        return $this->monsterHp;
    }

    public function setMonsterHp(int $monsterHp): static
    {
        $this->monsterHp = $monsterHp;

        return $this;
    }

    public function getMonsterMp(): ?int
    {
        return $this->monsterMp;
    }

    public function setMonsterMp(int $monsterMp): static
    {
        $this->monsterMp = $monsterMp;

        return $this;
    }

    public function getMonsterStrength(): ?int
    {
        return $this->monsterStrength;
    }

    public function setMonsterStrength(int $monsterStrength): static
    {
        $this->monsterStrength = $monsterStrength;

        return $this;
    }

    public function getMonsterMagic(): ?int
    {
        return $this->monsterMagic;
    }

    public function setMonsterMagic(int $monsterMagic): static
    {
        $this->monsterMagic = $monsterMagic;

        return $this;
    }

    public function getMonsterAgility(): ?int
    {
        return $this->monsterAgility;
    }

    public function setMonsterAgility(int $monsterAgility): static
    {
        $this->monsterAgility = $monsterAgility;

        return $this;
    }

    public function getMonsterDefense(): ?int
    {
        return $this->monsterDefense;
    }

    public function setMonsterDefense(int $monsterDefense): static
    {
        $this->monsterDefense = $monsterDefense;

        return $this;
    }

    public function getMonsterDefenseMagic(): ?int
    {
        return $this->monsterDefenseMagic;
    }

    public function setMonsterDefenseMagic(int $monsterDefenseMagic): static
    {
        $this->monsterDefenseMagic = $monsterDefenseMagic;

        return $this;
    }

    public function getMonsterExperience(): ?int
    {
        return $this->monsterExperience;
    }

    public function setMonsterExperience(int $monsterExperience): static
    {
        $this->monsterExperience = $monsterExperience;

        return $this;
    }

    public function getMonsterGold(): ?int
    {
        return $this->monsterGold;
    }

    public function setMonsterGold(int $monsterGold): static
    {
        $this->monsterGold = $monsterGold;

        return $this;
    }

    public function getMonsterLimited(): ?int
    {
        return $this->monsterLimited;
    }

    public function setMonsterLimited(int $monsterLimited): static
    {
        $this->monsterLimited = $monsterLimited;

        return $this;
    }

    public function getMonsterQuantity(): ?int
    {
        return $this->monsterQuantity;
    }

    public function setMonsterQuantity(int $monsterQuantity): static
    {
        $this->monsterQuantity = $monsterQuantity;

        return $this;
    }

    public function getMonsterQuantityBattle(): ?int
    {
        return $this->monsterQuantityBattle;
    }

    public function setMonsterQuantityBattle(int $monsterQuantityBattle): static
    {
        $this->monsterQuantityBattle = $monsterQuantityBattle;

        return $this;
    }

    public function getMonsterQuantityEscaped(): ?int
    {
        return $this->monsterQuantityEscaped;
    }

    public function setMonsterQuantityEscaped(int $monsterQuantityEscaped): static
    {
        $this->monsterQuantityEscaped = $monsterQuantityEscaped;

        return $this;
    }

    public function getMonsterQuantityVictory(): ?int
    {
        return $this->monsterQuantityVictory;
    }

    public function setMonsterQuantityVictory(int $monsterQuantityVictory): static
    {
        $this->monsterQuantityVictory = $monsterQuantityVictory;

        return $this;
    }

    public function getMonsterQuantityDefeated(): ?int
    {
        return $this->monsterQuantityDefeated;
    }

    public function setMonsterQuantityDefeated(int $monsterQuantityDefeated): static
    {
        $this->monsterQuantityDefeated = $monsterQuantityDefeated;

        return $this;
    }

    public function getMonsterQuantityDraw(): ?int
    {
        return $this->monsterQuantityDraw;
    }

    public function setMonsterQuantityDraw(int $monsterQuantityDraw): static
    {
        $this->monsterQuantityDraw = $monsterQuantityDraw;

        return $this;
    }
}