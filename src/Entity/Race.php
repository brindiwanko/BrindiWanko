<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceRepository::class)]
#[ORM\Table(name: "bw_races")]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "raceId")]
    private ?int $raceId = null;

    #[ORM\Column(length: 50)]
    private ?string $racePicture = null;

    #[ORM\Column(length: 30)]
    private ?string $raceName = null;

    #[ORM\Column(type: 'text')]
    private ?string $raceDescription = null;

    #[ORM\Column]
    private ?int $raceHpBonus = null;

    #[ORM\Column]
    private ?int $raceMpBonus = null;

    #[ORM\Column]
    private ?int $raceStrengthBonus = null;

    #[ORM\Column]
    private ?int $raceMagicBonus = null;

    #[ORM\Column]
    private ?int $raceAgilityBonus = null;

    #[ORM\Column]
    private ?int $raceDefenseBonus = null;

    #[ORM\Column]
    private ?int $raceDefenseMagicBonus = null;

    #[ORM\Column]
    private ?int $raceWisdomBonus = null;

    #[ORM\Column]
    private ?int $raceProspectingBonus = null;

    public function getRaceId(): ?int
    {
        return $this->raceId;
    }

    public function getRacePicture(): ?string
    {
        return $this->racePicture;
    }

    public function setRacePicture(string $racePicture): static
    {
        $this->racePicture = $racePicture;

        return $this;
    }

    public function getRaceName(): ?string
    {
        return $this->raceName;
    }

    public function setRaceName(string $raceName): static
    {
        $this->raceName = $raceName;

        return $this;
    }

    public function getRaceDescription(): ?string
    {
        return $this->raceDescription;
    }

    public function setRaceDescription(string $raceDescription): static
    {
        $this->raceDescription = $raceDescription;

        return $this;
    }

    public function getRaceHpBonus(): ?int
    {
        return $this->raceHpBonus;
    }

    public function setRaceHpBonus(int $raceHpBonus): static
    {
        $this->raceHpBonus = $raceHpBonus;

        return $this;
    }

    public function getRaceMpBonus(): ?int
    {
        return $this->raceMpBonus;
    }

    public function setRaceMpBonus(int $raceMpBonus): static
    {
        $this->raceMpBonus = $raceMpBonus;

        return $this;
    }

    public function getRaceStrengthBonus(): ?int
    {
        return $this->raceStrengthBonus;
    }

    public function setRaceStrengthBonus(int $raceStrengthBonus): static
    {
        $this->raceStrengthBonus = $raceStrengthBonus;

        return $this;
    }

    public function getRaceMagicBonus(): ?int
    {
        return $this->raceMagicBonus;
    }

    public function setRaceMagicBonus(int $raceMagicBonus): static
    {
        $this->raceMagicBonus = $raceMagicBonus;

        return $this;
    }

    public function getRaceAgilityBonus(): ?int
    {
        return $this->raceAgilityBonus;
    }

    public function setRaceAgilityBonus(int $raceAgilityBonus): static
    {
        $this->raceAgilityBonus = $raceAgilityBonus;

        return $this;
    }

    public function getRaceDefenseBonus(): ?int
    {
        return $this->raceDefenseBonus;
    }

    public function setRaceDefenseBonus(int $raceDefenseBonus): static
    {
        $this->raceDefenseBonus = $raceDefenseBonus;

        return $this;
    }

    public function getRaceDefenseMagicBonus(): ?int
    {
        return $this->raceDefenseMagicBonus;
    }

    public function setRaceDefenseMagicBonus(int $raceDefenseMagicBonus): static
    {
        $this->raceDefenseMagicBonus = $raceDefenseMagicBonus;

        return $this;
    }

    public function getRaceWisdomBonus(): ?int
    {
        return $this->raceWisdomBonus;
    }

    public function setRaceWisdomBonus(int $raceWisdomBonus): static
    {
        $this->raceWisdomBonus = $raceWisdomBonus;

        return $this;
    }

    public function getRaceProspectingBonus(): ?int
    {
        return $this->raceProspectingBonus;
    }

    public function setRaceProspectingBonus(int $raceProspectingBonus): static
    {
        $this->raceProspectingBonus = $raceProspectingBonus;

        return $this;
    }
}