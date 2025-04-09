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
    #[ORM\Column(name: "id")]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $picture = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $priceInn = null;

    #[ORM\Column]
    private ?int $chapter = null;

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

    public function getPriceInn(): ?int
    {
        return $this->priceInn;
    }

    public function setPriceInn(int $priceInn): static
    {
        $this->priceInn = $priceInn;

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
}