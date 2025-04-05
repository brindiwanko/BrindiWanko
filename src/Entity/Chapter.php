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
    #[ORM\Column(name: "chapterId")]
    private ?int $chapterId = null;

    #[ORM\Column]
    private ?int $chapterMonsterId = null;

    #[ORM\Column(length: 30)]
    private ?string $chapterTitle = null;

    #[ORM\Column(type: 'text')]
    private ?string $chapterOpening = null;

    #[ORM\Column(type: 'text')]
    private ?string $chapterEnding = null;

    public function getChapterId(): ?int
    {
        return $this->chapterId;
    }

    public function getChapterMonsterId(): ?int
    {
        return $this->chapterMonsterId;
    }

    public function setChapterMonsterId(int $chapterMonsterId): static
    {
        $this->chapterMonsterId = $chapterMonsterId;

        return $this;
    }

    public function getChapterTitle(): ?string
    {
        return $this->chapterTitle;
    }

    public function setChapterTitle(string $chapterTitle): static
    {
        $this->chapterTitle = $chapterTitle;

        return $this;
    }

    public function getChapterOpening(): ?string
    {
        return $this->chapterOpening;
    }

    public function setChapterOpening(string $chapterOpening): static
    {
        $this->chapterOpening = $chapterOpening;

        return $this;
    }

    public function getChapterEnding(): ?string
    {
        return $this->chapterEnding;
    }

    public function setChapterEnding(string $chapterEnding): static
    {
        $this->chapterEnding = $chapterEnding;

        return $this;
    }
}