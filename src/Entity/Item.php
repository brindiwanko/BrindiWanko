<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
#[ORM\Table(name: "bw_items")]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id")]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    private ?string $picture = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?int $levelRequired = null;

    #[ORM\Column]
    private ?int $hpEffect = null;

    #[ORM\Column]
    private ?int $mpEffect = null;

    #[ORM\Column]
    private ?int $strengthEffect = null;

    #[ORM\Column]
    private ?int $magicEffect = null;

    #[ORM\Column]
    private ?int $agilityEffect = null;

    #[ORM\Column]
    private ?int $defenseEffect = null;

    #[ORM\Column]
    private ?int $defenseMagicEffect = null;

    #[ORM\Column]
    private ?int $wisdomEffect = null;

    #[ORM\Column]
    private ?int $prospectingEffect = null;

    #[ORM\Column]
    private ?int $purchasePrice = null;

    #[ORM\Column]
    private ?int $salePrice = null;

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

    public function getLevelRequired(): ?int
    {
        return $this->levelRequired;
    }

    public function setLevelRequired(int $levelRequired): static
    {
        $this->levelRequired = $levelRequired;

        return $this;
    }

    public function getHpEffect(): ?int
    {
        return $this->hpEffect;
    }

    public function setHpEffect(int $hpEffect): static
    {
        $this->hpEffect = $hpEffect;

        return $this;
    }

    public function getMpEffect(): ?int
    {
        return $this->mpEffect;
    }

    public function setMpEffect(int $mpEffect): static
    {
        $this->mpEffect = $mpEffect;

        return $this;
    }

    public function getStrengthEffect(): ?int
    {
        return $this->strengthEffect;
    }

    public function setStrengthEffect(int $strengthEffect): static
    {
        $this->strengthEffect = $strengthEffect;

        return $this;
    }

    public function getMagicEffect(): ?int
    {
        return $this->magicEffect;
    }

    public function setMagicEffect(int $magicEffect): static
    {
        $this->magicEffect = $magicEffect;

        return $this;
    }

    public function getAgilityEffect(): ?int
    {
        return $this->agilityEffect;
    }

    public function setAgilityEffect(int $agilityEffect): static
    {
        $this->agilityEffect = $agilityEffect;

        return $this;
    }

    public function getDefenseEffect(): ?int
    {
        return $this->defenseEffect;
    }

    public function setDefenseEffect(int $defenseEffect): static
    {
        $this->defenseEffect = $defenseEffect;

        return $this;
    }

    public function getDefenseMagicEffect(): ?int
    {
        return $this->defenseMagicEffect;
    }

    public function setDefenseMagicEffect(int $defenseMagicEffect): static
    {
        $this->defenseMagicEffect = $defenseMagicEffect;

        return $this;
    }

    public function getWisdomEffect(): ?int
    {
        return $this->wisdomEffect;
    }

    public function setWisdomEffect(int $wisdomEffect): static
    {
        $this->wisdomEffect = $wisdomEffect;

        return $this;
    }

    public function getProspectingEffect(): ?int
    {
        return $this->prospectingEffect;
    }

    public function setProspectingEffect(int $prospectingEffect): static
    {
        $this->prospectingEffect = $prospectingEffect;

        return $this;
    }

    public function getPurchasePrice(): ?int
    {
        return $this->purchasePrice;
    }

    public function setPurchasePrice(int $purchasePrice): static
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    public function getSalePrice(): ?int
    {
        return $this->salePrice;
    }

    public function setSalePrice(int $salePrice): static
    {
        $this->salePrice = $salePrice;

        return $this;
    }
}