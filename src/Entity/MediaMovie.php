<?php

namespace App\Entity;

use App\Repository\MediaMovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediaMovieRepository::class)
 */
class MediaMovie
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
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="date")
     */
    private $release_date;

    /**
     * @ORM\Column(type="text")
     */
    private $summary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trailer_url;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="mediaMovies")
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shortSummary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idMovie;

    /**
     * @ORM\ManyToMany(targetEntity=Historic::class, mappedBy="mediaMovie")
     */
    private $historics;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $watch_duration;

    public function __construct()
    {
        $this->genre = new ArrayCollection();
        $this->historics = new ArrayCollection();
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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

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

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getTrailerUrl(): ?string
    {
        return $this->trailer_url;
    }

    public function setTrailerUrl(string $trailer_url): self
    {
        $this->trailer_url = $trailer_url;

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

    public function getShortSummary(): ?string
    {
        return $this->shortSummary;
    }

    public function setShortSummary(string $shortSummary): self
    {
        $this->shortSummary = $shortSummary;

        return $this;
    }

    public function getIdMovie(): ?string
    {
        return $this->idMovie;
    }

    public function setIdMovie(string $idMovie): self
    {
        $this->idMovie = $idMovie;

        return $this;
    }

    /**
     * @return Collection|Historic[]
     */
    public function getHistorics(): Collection
    {
        return $this->historics;
    }

    public function addHistoric(Historic $historic): self
    {
        if (!$this->historics->contains($historic)) {
            $this->historics[] = $historic;
            $historic->addMediaMovie($this);
        }

        return $this;
    }

    public function removeHistoric(Historic $historic): self
    {
        if ($this->historics->contains($historic)) {
            $this->historics->removeElement($historic);
            $historic->removeMediaMovie($this);
        }

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
}
