<?php

namespace App\Entity;

use App\Repository\TownRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TownRepository::class)]
#[ORM\Table(name: "bw_towns")]
class Town
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "townId")]
    private ?int $townId = null;

    #[ORM\Column(length: 50)]
    private ?string $townPicture = null;

    #[ORM\Column(length: 30)]
    private ?string $townName = null;

    #[ORM\Column(type: 'text')]
    private ?string $townDescription = null;

    #[ORM\Column]
    private ?int $townPriceInn = null;

    #[ORM\Column]
    private ?int $townChapter = null;

    public function getTownId(): ?int
    {
        return $this->townId;
    }

    public function getTownPicture(): ?string
    {
        return $this->townPicture;
    }

    public function setTownPicture(string $townPicture): static
    {
        $this->townPicture = $townPicture;

        return $this;
    }

    public function getTownName(): ?string
    {
        return $this->townName;
    }

    public function setTownName(string $townName): static
    {
        $this->townName = $townName;

        return $this;
    }

    public function getTownDescription(): ?string
    {
        return $this->townDescription;
    }

    public function setTownDescription(string $townDescription): static
    {
        $this->townDescription = $townDescription;

        return $this;
    }

    public function getTownPriceInn(): ?int
    {
        return $this->townPriceInn;
    }

    public function setTownPriceInn(int $townPriceInn): static
    {
        $this->townPriceInn = $townPriceInn;

        return $this;
    }

    public function getTownChapter(): ?int
    {
        return $this->townChapter;
    }

    public function setTownChapter(int $townChapter): static
    {
        $this->townChapter = $townChapter;

        return $this;
    }
}