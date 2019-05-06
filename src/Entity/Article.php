<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @Assert\Image()
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Categorie", inversedBy="articles")
     */
    private $laCategorie;

    public function __construct()
    {
        $this->laCategorie = new ArrayCollection();
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getLaCategorie(): Collection
    {
        return $this->laCategorie;
    }

    public function addLaCategorie(Categorie $laCategorie): self
    {
        if (!$this->laCategorie->contains($laCategorie)) {
            $this->laCategorie[] = $laCategorie;
        }

        return $this;
    }

    public function removeLaCategorie(Categorie $laCategorie): self
    {
        if ($this->laCategorie->contains($laCategorie)) {
            $this->laCategorie->removeElement($laCategorie);
        }

        return $this;
    }
}
