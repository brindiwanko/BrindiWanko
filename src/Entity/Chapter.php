<?php

namespace App\Entity;

use App\Repository\ChapterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChapterRepository::class)]
#[ORM\Table(name: "bw_chapters")]
class Chapter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id")]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $title = null;

    #[ORM\Column(type: 'text')]
    private ?string $opening = null;

    #[ORM\Column(type: 'text')]
    private ?string $ending = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getOpening(): ?string
    {
        return $this->opening;
    }

    public function setOpening(string $opening): static
    {
        $this->opening = $opening;

        return $this;
    }

    public function getEnding(): ?string
    {
        return $this->ending;
    }

    public function setEnding(string $ending): static
    {
        $this->ending = $ending;

        return $this;
    }
}