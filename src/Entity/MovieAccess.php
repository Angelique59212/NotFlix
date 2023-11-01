<?php

namespace App\Entity;

use App\Repository\MovieAccessRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieAccessRepository::class)]
class MovieAccess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'movieAccesses')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Subscription $subscription = null;

    #[ORM\ManyToOne(inversedBy: 'movieAccesses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Movie $movie = null;

    #[ORM\Column]
    private ?bool $authorizedAccess = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    public function setSubscription(?Subscription $subscription): static
    {
        $this->subscription = $subscription;

        return $this;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): static
    {
        $this->movie = $movie;

        return $this;
    }

    public function isAuthorizedAccess(): ?bool
    {
        return $this->authorizedAccess;
    }

    public function setAuthorizedAccess(bool $authorizedAccess): static
    {
        $this->authorizedAccess = $authorizedAccess;

        return $this;
    }
}
