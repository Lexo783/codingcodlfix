<?php

namespace App\Entity;

use App\Repository\HistoricRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoricRepository::class)
 */
class Historic
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Users::class, inversedBy="historics")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=MediaMovie::class, inversedBy="historics")
     */
    private $mediaMovie;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $start_date;

    /**
     * @ORM\Column(type="date")
     */
    private $finish_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $watch_duration;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->mediaMovie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(Users $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|MediaMovie[]
     */
    public function getMediaMovie(): Collection
    {
        return $this->mediaMovie;
    }

    public function addMediaMovie(MediaMovie $mediaMovie): self
    {
        if (!$this->mediaMovie->contains($mediaMovie)) {
            $this->mediaMovie[] = $mediaMovie;
        }

        return $this;
    }

    public function removeMediaMovie(MediaMovie $mediaMovie): self
    {
        if ($this->mediaMovie->contains($mediaMovie)) {
            $this->mediaMovie->removeElement($mediaMovie);
        }

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(?\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getFinishDate(): ?\DateTimeInterface
    {
        return $this->finish_date;
    }

    public function setFinishDate(?\DateTimeInterface $finish_date): self
    {
        $this->finish_date = $finish_date;

        return $this;
    }

    public function getWatchDuration(): ?int
    {
        return $this->watch_duration;
    }

    public function setWatchDuration(int $watch_duration): self
    {
        $this->watch_duration = $watch_duration;

        return $this;
    }
}
