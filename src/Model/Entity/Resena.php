<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Resena Entity
 *
 * @property string $id
 * @property string $ref
 * @property string $slug
 * @property string $calificacion
 * @property string $user_id
 * @property string $cerveza_id
 * @property string|null $comentario
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Cerveza $cerveza
 */
class Resena extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'ref' => true,
        'slug' => true,
        'calificacion' => true,
        'user_id' => true,
        'cerveza_id' => true,
        'comentario' => true,
        'user' => true,
        'cerveza' => true,
    ];
}
