<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Cerveza;
use Authorization\IdentityInterface;

/**
 * Cerveza policy
 */
class CervezaPolicy
{
    /**
     * Check if $user can add Cerveza
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Cerveza $cerveza
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Cerveza $cerveza)
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can edit Cerveza
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Cerveza $cerveza
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Cerveza $cerveza)
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can delete Cerveza
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Cerveza $cerveza
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Cerveza $cerveza)
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can view Cerveza
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Cerveza $cerveza
     * @return bool
     */
    public function canView(IdentityInterface $user, Cerveza $cerveza)
    {
        return true;
    }

    protected function isAdmin(IdentityInterface $user)
    {
        foreach ($user->roles as $rol) {
            if ($rol === 'admin') return true;
        }
        return false;
    }
}
