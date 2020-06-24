<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeasonRepository::class)
 */
class Season
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity=Series::class, inversedBy="seasons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $series;

    /**
     * @ORM\Column(type="date")
     */
    private $release_date;

    /**
     * @ORM\OneToMany(targetEntity=MediaSeries::class, mappedBy="season", orphanRemoval=true)
     */
    private $mediaSeries;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    public function __construct()
    {
        $this->mediaSeries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSeries(): ?Series
    {
        return $this->series;
    }

    public function setSeries(?Series $series): self
    {
        $this->series = $series;

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

    /**
     * @return Collection|MediaSeries[]
     */
    public function getMediaSeries(): Collection
    {
        return $this->mediaSeries;
    }

    public function addMediaSeries(MediaSeries $mediaSeries): self
    {
        if (!$this->mediaSeries->contains($mediaSeries)) {
            $this->mediaSeries[] = $mediaSeries;
            $mediaSeries->setSeason($this);
        }

        return $this;
    }

    public function removeMediaSeries(MediaSeries $mediaSeries): self
    {
        if ($this->mediaSeries->contains($mediaSeries)) {
            $this->mediaSeries->removeElement($mediaSeries);
            // set the owning side to null (unless already changed)
            if ($mediaSeries->getSeason() === $this) {
                $mediaSeries->setSeason(null);
            }
        }

        return $this;
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
}
