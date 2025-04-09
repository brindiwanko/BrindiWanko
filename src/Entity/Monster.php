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
    #[ORM\Column(name: "id")]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $picture = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?int $hp = null;

    #[ORM\Column]
    private ?int $mp = null;

    #[ORM\Column]
    private ?int $strength = null;

    #[ORM\Column]
    private ?int $magic = null;

    #[ORM\Column]
    private ?int $agility = null;

    #[ORM\Column]
    private ?int $defense = null;

    #[ORM\Column]
    private ?int $defenseMagic = null;

    #[ORM\Column]
    private ?int $eperience = null;

    #[ORM\Column]
    private ?int $gold = null;

    #[ORM\Column(length: 30)]
    private ?int $limited = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?int $quantityBattle = null;

    #[ORM\Column]
    private ?int $quantityEscaped = null;

    #[ORM\Column]
    private ?int $quantityVictory = null;

    #[ORM\Column]
    private ?int $quantityDefeated = null;

    #[ORM\Column]
    private ?int $quantityDraw = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): static
    {
        $this->hp = $hp;

        return $this;
    }

    public function getMp(): ?int
    {
        return $this->mp;
    }

    public function setMp(int $mp): static
    {
        $this->mp = $mp;

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

    public function getMagic(): ?int
    {
        return $this->magic;
    }

    public function setMagic(int $magic): static
    {
        $this->magic = $magic;

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

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): static
    {
        $this->defense = $defense;

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

    public function getEperience(): ?int
    {
        return $this->eperience;
    }

    public function setEperience(int $eperience): static
    {
        $this->eperience = $eperience;

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

    public function getLimited(): ?int
    {
        return $this->limited;
    }

    public function setLimited(int $limited): static
    {
        $this->limited = $limited;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getQuantityBattle(): ?int
    {
        return $this->quantityBattle;
    }

    public function setQuantityBattle(int $quantityBattle): static
    {
        $this->quantityBattle = $quantityBattle;

        return $this;
    }

    public function getQuantityEscaped(): ?int
    {
        return $this->quantityEscaped;
    }

    public function setQuantityEscaped(int $quantityEscaped): static
    {
        $this->quantityEscaped = $quantityEscaped;

        return $this;
    }

    public function getQuantityVictory(): ?int
    {
        return $this->quantityVictory;
    }

    public function setQuantityVictory(int $quantityVictory): static
    {
        $this->quantityVictory = $quantityVictory;

        return $this;
    }

    public function getQuantityDefeated(): ?int
    {
        return $this->quantityDefeated;
    }

    public function setQuantityDefeated(int $quantityDefeated): static
    {
        $this->quantityDefeated = $quantityDefeated;

        return $this;
    }

    public function getQuantityDraw(): ?int
    {
        return $this->quantityDraw;
    }

    public function setQuantityDraw(int $quantityDraw): static
    {
        $this->quantityDraw = $quantityDraw;

        return $this;
    }
}