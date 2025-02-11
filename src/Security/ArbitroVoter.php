<?php

namespace App\Security;

use App\Entity\Arbitro;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class ArbitroVoter extends Voter
{
    const MODIFICAR = 'ARBITRO_MODIFICAR';

    private Security $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $subject)
    {
        if (!$subject instanceof Arbitro) {
            return false;
        }
        if ($attribute === self::MODIFICAR) {
            return true;
        }
        return false;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token)
    {
        assert($subject instanceof Arbitro);
        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }
        if ($token->getUser() === $subject) {
            return true;
        }
        return false;
    }
}