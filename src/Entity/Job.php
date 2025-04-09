<?php

namespace App\Entity;

use App\Repository\jobRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobRepository::class)]
#[ORM\Table(name: "bw_jobs")]
class Job
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
    private ?int $hpBonus = null;

    #[ORM\Column]
    private ?int $mpBonus = null;

    #[ORM\Column]
    private ?int $strengthBonus = null;

    #[ORM\Column]
    private ?int $magicBonus = null;

    #[ORM\Column]
    private ?int $agilityBonus = null;

    #[ORM\Column]
    private ?int $defenseBonus = null;

    #[ORM\Column]
    private ?int $defenseMagicBonus = null;

    #[ORM\Column]
    private ?int $wisdomBonus = null;

    #[ORM\Column]
    private ?int $prospectingBonus = null;

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

    public function getHpBonus(): ?int
    {
        return $this->hpBonus;
    }

    public function setHpBonus(int $hpBonus): static
    {
        $this->hpBonus = $hpBonus;

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

    public function getStrengthBonus(): ?int
    {
        return $this->strengthBonus;
    }

    public function setStrengthBonus(int $strengthBonus): static
    {
        $this->strengthBonus = $strengthBonus;

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

    public function getAgilityBonus(): ?int
    {
        return $this->agilityBonus;
    }

    public function setAgilityBonus(int $agilityBonus): static
    {
        $this->agilityBonus = $agilityBonus;

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

    public function getDefenseMagicBonus(): ?int
    {
        return $this->defenseMagicBonus;
    }

    public function setDefenseMagicBonus(int $defenseMagicBonus): static
    {
        $this->defenseMagicBonus = $defenseMagicBonus;

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

    public function getProspectingBonus(): ?int
    {
        return $this->prospectingBonus;
    }

    public function setProspectingBonus(int $prospectingBonus): static
    {
        $this->prospectingBonus = $prospectingBonus;

        return $this;
    }
}