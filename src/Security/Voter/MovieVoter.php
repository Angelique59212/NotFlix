<?php

namespace App\Security\Voter;

use App\Entity\Movie;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class MovieVoter extends Voter
{
    private $security;

    public const VIEW = 'MOVIES_VIEW';

    /**
     * @param $security
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        return $attribute == self::VIEW
            && $subject instanceof Movie;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        if (!$user instanceof UserInterface) {
            return false;
        }

        if ($attribute == self::VIEW) {
            $subscription = $user->getSubscription();

            if (!$subscription) {
                return false;
            }

            if ($this->security->isGranted("ROLE_PREMIUM")) {
                return true;
            } elseif ($this->security->isGranted("ROLE_FREE")) {
                return $this->verifyLimitAccess($user, $subject);
            }

        }
        return false;
    }

    private function verifyLimitAccess($subscription, $subject): bool
    {
        $moviesAccess = $subscription->getMovieAccesses();
        foreach ($moviesAccess as $movieAccess) {
            if ($movieAccess->getMovie() === $subject) {
                return true;
            }
        }
        return false;
    }
}
