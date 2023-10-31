<?php

namespace App\Entity;

use App\Repository\SubscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionRepository::class)]
class Subscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\OneToMany(mappedBy: 'subscription', targetEntity: User::class)]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'subscription', targetEntity: MovieAccess::class)]
    private Collection $movieAccesses;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->movieAccesses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setSubscription($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getSubscription() === $this) {
                $user->setSubscription(null);
            }
        }

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
            $movieAccess->setSubscription($this);
        }

        return $this;
    }

    public function removeMovieAccess(MovieAccess $movieAccess): static
    {
        if ($this->movieAccesses->removeElement($movieAccess)) {
            // set the owning side to null (unless already changed)
            if ($movieAccess->getSubscription() === $this) {
                $movieAccess->setSubscription(null);
            }
        }

        return $this;
    }
}
