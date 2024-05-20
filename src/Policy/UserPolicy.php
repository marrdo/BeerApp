<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

/**
 * User policy
 */
class UserPolicy
{

    public function canIndex(IdentityInterface $user, User $userEntity)
    {
        return true; // Permitir siempre acceso a index
    }
    /**
     * Check if $user can add User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $userEntity
     * @return bool
     */
    public function canAdd(IdentityInterface $user, User $userEntity)
    {
        return true;
    }

    /**
     * Check if $user can edit User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $userEntity
     * @return bool
     */
    public function canEdit(IdentityInterface $user, User $userEntity)
    {
        if ($user->role === 'admin') {
            return true;
        }

        // Permitir que los usuarios editen sus propios datos
        return $user->getIdentifier() === $userEntity->id;
    }

    /**
     * Check if $user can delete User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $userEntity
     * @return bool
     */
    public function canDelete(IdentityInterface $user, User $userEntity)
    {
        if ($user->role === 'admin') {
            return true;
        }

        // Permitir que los usuarios editen sus propios datos
        return $user->getIdentifier() === $userEntity->id;
    }

    /**
     * Check if $user can view User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $userEntity
     * @return bool
     */
    public function canView(IdentityInterface $user, User $userEntity)
    {
        return true;
    }
}
