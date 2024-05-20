<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Cerveza;
use Authorization\IdentityInterface;
use Cake\ORM\TableRegistry;

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

    public function canIndex(IdentityInterface $user, Cerveza $cerveza)
    {
        return true;
    }

    protected function isAdmin(IdentityInterface $user)
    {
        $rol= TableRegistry::getTableLocator()->get('Users')->find()->where(['id' => $user->id])->contain(['Roles'])->first()->roles[0]->nombre;
        
        if ($rol === 'admin') return true;
        
        return false;
    }
}
