<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cerveza Entity
 *
 * @property string $id
 * @property string $ref
 * @property string $slug
 * @property string $nombre
 * @property string|null $descripcion
 * @property string|null $precio
 * @property int|null $stock
 * @property string|null $media_valoracion
 * @property string|null $tipo
 * @property int|null $ibu
 * @property string|null $grados_alcohol
 * @property string|null $color
 * @property string|null $origen
 * @property string|null $familia_estilos
 * @property string|null $sabor_dominante
 *
 * @property \App\Model\Entity\Resena[] $resenas
 */
class Cerveza extends Entity
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
        'nombre' => true,
        'descripcion' => true,
        'precio' => true,
        'stock' => true,
        'media_valoracion' => true,
        'tipo' => true,
        'ibu' => true,
        'grados_alcohol' => true,
        'color' => true,
        'origen' => true,
        'familia_estilos' => true,
        'sabor_dominante' => true,
        'resenas' => true,
    ];
}
