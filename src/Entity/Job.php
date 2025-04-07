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
    #[ORM\Column(name: "jobId")]
    private ?int $jobId = null;

    #[ORM\Column(length: 50)]
    private ?string $jobPicture = null;

    #[ORM\Column(length: 30)]
    private ?string $jobName = null;

    #[ORM\Column(type: 'text')]
    private ?string $jobDescription = null;

    #[ORM\Column]
    private ?int $jobHpBonus = null;

    #[ORM\Column]
    private ?int $jobMpBonus = null;

    #[ORM\Column]
    private ?int $jobStrengthBonus = null;

    #[ORM\Column]
    private ?int $jobMagicBonus = null;

    #[ORM\Column]
    private ?int $jobAgilityBonus = null;

    #[ORM\Column]
    private ?int $jobDefenseBonus = null;

    #[ORM\Column]
    private ?int $jobDefenseMagicBonus = null;

    #[ORM\Column]
    private ?int $jobWisdomBonus = null;

    #[ORM\Column]
    private ?int $jobProspectingBonus = null;

    public function getJobId(): ?int
    {
        return $this->jobId;
    }

    public function getJobPicture(): ?string
    {
        return $this->jobPicture;
    }

    public function setJobPicture(string $jobPicture): static
    {
        $this->jobPicture = $jobPicture;

        return $this;
    }

    public function getJobName(): ?string
    {
        return $this->jobName;
    }

    public function setJobName(string $jobName): static
    {
        $this->jobName = $jobName;

        return $this;
    }

    public function getJobDescription(): ?string
    {
        return $this->jobDescription;
    }

    public function setJobDescription(string $jobDescription): static
    {
        $this->jobDescription = $jobDescription;

        return $this;
    }

    public function getJobHpBonus(): ?int
    {
        return $this->jobHpBonus;
    }

    public function setJobHpBonus(int $jobHpBonus): static
    {
        $this->jobHpBonus = $jobHpBonus;

        return $this;
    }

    public function getJobMpBonus(): ?int
    {
        return $this->jobMpBonus;
    }

    public function setJobMpBonus(int $jobMpBonus): static
    {
        $this->jobMpBonus = $jobMpBonus;

        return $this;
    }

    public function getJobStrengthBonus(): ?int
    {
        return $this->jobStrengthBonus;
    }

    public function setJobStrengthBonus(int $jobStrengthBonus): static
    {
        $this->jobStrengthBonus = $jobStrengthBonus;

        return $this;
    }

    public function getJobMagicBonus(): ?int
    {
        return $this->jobMagicBonus;
    }

    public function setJobMagicBonus(int $jobMagicBonus): static
    {
        $this->jobMagicBonus = $jobMagicBonus;

        return $this;
    }

    public function getJobAgilityBonus(): ?int
    {
        return $this->jobAgilityBonus;
    }

    public function setJobAgilityBonus(int $jobAgilityBonus): static
    {
        $this->jobAgilityBonus = $jobAgilityBonus;

        return $this;
    }

    public function getJobDefenseBonus(): ?int
    {
        return $this->jobDefenseBonus;
    }

    public function setJobDefenseBonus(int $jobDefenseBonus): static
    {
        $this->jobDefenseBonus = $jobDefenseBonus;

        return $this;
    }

    public function getJobDefenseMagicBonus(): ?int
    {
        return $this->jobDefenseMagicBonus;
    }

    public function setJobDefenseMagicBonus(int $jobDefenseMagicBonus): static
    {
        $this->jobDefenseMagicBonus = $jobDefenseMagicBonus;

        return $this;
    }

    public function getJobWisdomBonus(): ?int
    {
        return $this->jobWisdomBonus;
    }

    public function setJobWisdomBonus(int $jobWisdomBonus): static
    {
        $this->jobWisdomBonus = $jobWisdomBonus;

        return $this;
    }

    public function getJobProspectingBonus(): ?int
    {
        return $this->jobProspectingBonus;
    }

    public function setJobProspectingBonus(int $jobProspectingBonus): static
    {
        $this->jobProspectingBonus = $jobProspectingBonus;

        return $this;
    }
}