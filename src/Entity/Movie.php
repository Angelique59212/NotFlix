<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\OneToMany(mappedBy: 'movie', targetEntity: MovieAccess::class)]
    private Collection $movieAccesses;

    public function __construct()
    {
        $this->movieAccesses = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection<int, MovieAccess>
     */
    public function getMovieAccesses(): Collection
    {
        return $this->movieAccesses;
    }

    public function addMovieAccess(MovieAccess $movieAccess): static
    {
        if (!$this->movieAccesses->contains($movieAccess)) {
            $this->movieAccesses->add($movieAccess);
            $movieAccess->setMovie($this);
        }

        return $this;
    }

    public function removeMovieAccess(MovieAccess $movieAccess): static
    {
        if ($this->movieAccesses->removeElement($movieAccess)) {
            // set the owning side to null (unless already changed)
            if ($movieAccess->getMovie() === $this) {
                $movieAccess->setMovie(null);
            }
        }

        return $this;
    }
}
