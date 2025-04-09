<?php

namespace App\Entity;

use App\Repository\ConfigurationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConfigurationRepository::class)]
#[ORM\Table(name: "bw_configurations")]
class Configuration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id")]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $gameName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $presentation = null;

    #[ORM\Column]
    private ?int $maxLevel = null;

    #[ORM\Column]
    private ?int $experience = null;

    #[ORM\Column]
    private ?int $skillPoint = null;

    #[ORM\Column]
    private ?int $experienceBonus = null;

    #[ORM\Column]
    private ?int $goldBonus = null;

    #[ORM\Column]
    private ?int $dropBonus = null;

    #[ORM\Column(length: 30)]
    private ?string $access = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGameName(): ?string
    {
        return $this->gameName;
    }

    public function setGameName(string $gameName): static
    {
        $this->gameName = $gameName;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): static
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getMaxLevel(): ?int
    {
        return $this->maxLevel;
    }

    public function setMaxLevel(int $maxLevel): static
    {
        $this->maxLevel = $maxLevel;

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

    public function getSkillPoint(): ?int
    {
        return $this->skillPoint;
    }

    public function setSkillPoint(int $skillPoint): static
    {
        $this->skillPoint = $skillPoint;

        return $this;
    }

    public function getExperienceBonus(): ?int
    {
        return $this->experienceBonus;
    }

    public function setExperienceBonus(int $experienceBonus): static
    {
        $this->experienceBonus = $experienceBonus;

        return $this;
    }

    public function getGoldBonus(): ?int
    {
        return $this->goldBonus;
    }

    public function setGoldBonus(int $goldBonus): static
    {
        $this->goldBonus = $goldBonus;

        return $this;
    }

    public function getDropBonus(): ?int
    {
        return $this->dropBonus;
    }

    public function setDropBonus(int $dropBonus): static
    {
        $this->dropBonus = $dropBonus;

        return $this;
    }

    public function getAccess(): ?string
    {
        return $this->access;
    }

    public function setAccess(string $access): static
    {
        $this->access = $access;

        return $this;
    }
}