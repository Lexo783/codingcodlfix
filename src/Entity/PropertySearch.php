<?php

namespace App\Entity;

class PropertySearch
{
    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $genre;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return PropertySearch
     */
    public function setTitle(string $title): PropertySearch
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGenre(): ?string
    {
        return $this->genre;
    }

    /**
     * @param string|null $genre
     * @return PropertySearch
     */
    public function setGenre(string $genre): PropertySearch
    {
        $this->genre = $genre;
        return $this;
    }

}
