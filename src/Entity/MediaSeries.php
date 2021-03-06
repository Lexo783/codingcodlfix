<?php

namespace App\Entity;

use App\Repository\MediaSeriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediaSeriesRepository::class)
 */
class MediaSeries
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity=Season::class, inversedBy="mediaSeries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $season;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $media_url;

    /**
     * @ORM\Column(type="date")
     */
    private $release_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shortSummary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idSeries;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $watch_duration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $summary;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="mediaSeries")
     */
    private $genre;

    public function __construct()
    {
        $this->genre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): self
    {
        $this->season = $season;

        return $this;
    }

    public function getMediaUrl(): ?string
    {
        return $this->media_url;
    }

    public function setMediaUrl(string $media_url): self
    {
        $this->media_url = $media_url;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(\DateTimeInterface $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getShortSummary(): ?string
    {
        return $this->shortSummary;
    }

    public function setShortSummary(string $shortSummary): self
    {
        $this->shortSummary = $shortSummary;

        return $this;
    }

    public function getIdSeries(): ?string
    {
        return $this->idSeries;
    }

    public function setIdSeries(string $idSeries): self
    {
        $this->idSeries = $idSeries;

        return $this;
    }

    public function getWatchDuration(): ?string
    {
        return $this->watch_duration;
    }

    public function setWatchDuration(string $watch_duration): self
    {
        $this->watch_duration = $watch_duration;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        if ($this->genre->contains($genre)) {
            $this->genre->removeElement($genre);
        }

        return $this;
    }
}
