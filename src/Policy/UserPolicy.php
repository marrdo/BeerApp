<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;
use Cake\ORM\TableRegistry;

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

        // Permitir que los usuarios editen sus propios datos
        return ($this->isAdmin($userEntity) || $this->isAutor($user,$userEntity)) ? true : false;
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
        return ($this->isAdmin($userEntity) || $this->isAutor($user,$userEntity)) ? true : false;
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

    protected function isAdmin(User $currentUser)
    {
        
        $user = TableRegistry::getTableLocator()->get('Users')->find()
            ->where(['Users.id' => $currentUser->id])
            ->contain(['Roles'])
            ->first();
        if (!empty($user->roles)) {
            foreach ($user->roles as $role) {
                if ($role->nombre === 'admin') {
                    return true;
                }
            }
        }
        return false;
    }

    protected function isAutor(IdentityInterface $user, User $userEntity)
    {
        return $user->id === $userEntity->id ? true : false;
    }
}
