<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Resena;
use Authorization\IdentityInterface;

/**
 * Resena policy
 */
class ResenaPolicy
{
    /**
     * Check if $user can add Resena
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Resena $resena
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Resena $resena)
    {
        return true;
    }

    /**
     * Check if $user can edit Resena
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Resena $resena
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Resena $resena)
    {
        return $this->isAuthor($user, $resena);
    }

    /**
     * Check if $user can delete Resena
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Resena $resena
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Resena $resena)
    {
        return $this->isAuthor($user, $resena);
    }

    /**
     * Check if $user can view Resena
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Resena $resena
     * @return bool
     */
    public function canView(IdentityInterface $user, Resena $resena)
    {
        return true;
    }

    protected function isAuthor(IdentityInterface $user, Resena $resena)
    {
        return $resena->user_id === $user->getIdentifier();
    }

    protected function isAdmin(IdentityInterface $user)
    {
        foreach ($user->roles as $rol) {
            if ($rol === 'admin') return true;
        }
        return false;
    }
}
