<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
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
    private $genreName;

    /**
     * @ORM\ManyToMany(targetEntity=MediaMovie::class, mappedBy="genre")
     */
    private $mediaMovies;

    /**
     * @ORM\ManyToMany(targetEntity=Series::class, mappedBy="genre")
     */
    private $series;

    public function __construct()
    {
        $this->mediaMovies = new ArrayCollection();
        $this->series = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenreName(): ?string
    {
        return $this->genreName;
    }

    public function setGenreName(string $genreName): self
    {
        $this->genreName = $genreName;

        return $this;
    }

    /**
     * @return Collection|MediaMovie[]
     */
    public function getMediaMovies(): Collection
    {
        return $this->mediaMovies;
    }

    public function addMediaMovie(MediaMovie $mediaMovie): self
    {
        if (!$this->mediaMovies->contains($mediaMovie)) {
            $this->mediaMovies[] = $mediaMovie;
            $mediaMovie->addGenre($this);
        }

        return $this;
    }

    public function removeMediaMovie(MediaMovie $mediaMovie): self
    {
        if ($this->mediaMovies->contains($mediaMovie)) {
            $this->mediaMovies->removeElement($mediaMovie);
            $mediaMovie->removeGenre($this);
        }

        return $this;
    }

    /**
     * @return Collection|Series[]
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSeries(Series $series): self
    {
        if (!$this->series->contains($series)) {
            $this->series[] = $series;
            $series->addGenre($this);
        }

        return $this;
    }

    public function removeSeries(Series $series): self
    {
        if ($this->series->contains($series)) {
            $this->series->removeElement($series);
            $series->removeGenre($this);
        }

        return $this;
    }
}
