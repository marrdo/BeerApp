<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Resena;
use Authorization\IdentityInterface;
use Cake\ORM\TableRegistry;

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
        return ($this->isAuthor($user, $resena) || $this->isAdmin($user));
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

    protected function isAdmin(IdentityInterface $currentUser)
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
}
