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
    #[ORM\Column(name: "itemId")]
    private ?int $itemId = null;

    #[ORM\Column(type: 'text')]
    private ?string $itemPicture = null;

    #[ORM\Column(length: 30)]
    private ?string $itemName = null;

    #[ORM\Column(type: 'text')]
    private ?string $itemDescription = null;

    #[ORM\Column]
    private ?int $itemLevel = null;

    #[ORM\Column]
    private ?int $itemLevelRequired = null;

    #[ORM\Column]
    private ?int $itemHpEffect = null;

    #[ORM\Column]
    private ?int $itemMpEffect = null;

    #[ORM\Column]
    private ?int $itemStrengthEffect = null;

    #[ORM\Column]
    private ?int $itemMagicEffect = null;

    #[ORM\Column]
    private ?int $itemAgilityEffect = null;

    #[ORM\Column]
    private ?int $itemDefenseEffect = null;

    #[ORM\Column]
    private ?int $itemDefenseMagicEffect = null;

    #[ORM\Column]
    private ?int $itemWisdomEffect = null;

    #[ORM\Column]
    private ?int $itemProspectingEffect = null;

    #[ORM\Column]
    private ?int $itemPurchasePrice = null;

    #[ORM\Column]
    private ?int $itemSalePrice = null;

    public function getItemId(): ?int
    {
        return $this->itemId;
    }

    public function getItemPicture(): ?string
    {
        return $this->itemPicture;
    }

    public function setItemPicture(string $itemPicture): static
    {
        $this->itemPicture = $itemPicture;

        return $this;
    }

    public function getItemName(): ?string
    {
        return $this->itemName;
    }

    public function setItemName(string $itemName): static
    {
        $this->itemName = $itemName;

        return $this;
    }

    public function getItemDescription(): ?string
    {
        return $this->itemDescription;
    }

    public function setItemDescription(string $itemDescription): static
    {
        $this->itemDescription = $itemDescription;

        return $this;
    }

    public function getItemLevel(): ?int
    {
        return $this->itemLevel;
    }

    public function setItemLevel(int $itemLevel): static
    {
        $this->itemLevel = $itemLevel;

        return $this;
    }

    public function getItemLevelRequired(): ?int
    {
        return $this->itemLevelRequired;
    }

    public function setItemLevelRequired(int $itemLevelRequired): static
    {
        $this->itemLevelRequired = $itemLevelRequired;

        return $this;
    }

    public function getItemHpEffect(): ?int
    {
        return $this->itemHpEffect;
    }

    public function setItemHpEffect(int $itemHpEffect): static
    {
        $this->itemHpEffect = $itemHpEffect;

        return $this;
    }

    public function getItemMpEffect(): ?int
    {
        return $this->itemMpEffect;
    }

    public function setItemMpEffect(int $itemMpEffect): static
    {
        $this->itemMpEffect = $itemMpEffect;

        return $this;
    }

    public function getItemStrengthEffect(): ?int
    {
        return $this->itemStrengthEffect;
    }

    public function setItemStrengthEffect(int $itemStrengthEffect): static
    {
        $this->itemStrengthEffect = $itemStrengthEffect;

        return $this;
    }

    public function getItemMagicEffect(): ?int
    {
        return $this->itemMagicEffect;
    }

    public function setItemMagicEffect(int $itemMagicEffect): static
    {
        $this->itemMagicEffect = $itemMagicEffect;

        return $this;
    }

    public function getItemAgilityEffect(): ?int
    {
        return $this->itemAgilityEffect;
    }

    public function setItemAgilityEffect(int $itemAgilityEffect): static
    {
        $this->itemAgilityEffect = $itemAgilityEffect;

        return $this;
    }

    public function getItemDefenseEffect(): ?int
    {
        return $this->itemDefenseEffect;
    }

    public function setItemDefenseEffect(int $itemDefenseEffect): static
    {
        $this->itemDefenseEffect = $itemDefenseEffect;

        return $this;
    }

    public function getItemDefenseMagicEffect(): ?int
    {
        return $this->itemDefenseMagicEffect;
    }

    public function setItemDefenseMagicEffect(int $itemDefenseMagicEffect): static
    {
        $this->itemDefenseMagicEffect = $itemDefenseMagicEffect;

        return $this;
    }

    public function getItemWisdomEffect(): ?int
    {
        return $this->itemWisdomEffect;
    }

    public function setItemWisdomEffect(int $itemWisdomEffect): static
    {
        $this->itemWisdomEffect = $itemWisdomEffect;

        return $this;
    }

    public function getItemProspectingEffect(): ?int
    {
        return $this->itemProspectingEffect;
    }

    public function setItemProspectingEffect(int $itemProspectingEffect): static
    {
        $this->itemProspectingEffect = $itemProspectingEffect;

        return $this;
    }

    public function getItemPurchasePrice(): ?int
    {
        return $this->itemPurchasePrice;
    }

    public function setItemPurchasePrice(int $itemPurchasePrice): static
    {
        $this->itemPurchasePrice = $itemPurchasePrice;

        return $this;
    }

    public function getItemSalePrice(): ?int
    {
        return $this->itemSalePrice;
    }

    public function setItemSalePrice(int $itemSalePrice): static
    {
        $this->itemSalePrice = $itemSalePrice;

        return $this;
    }
}