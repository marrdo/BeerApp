<?php

namespace App\Model\Utilities;

use Cake\ORM\TableRegistry;

class UtilitiesModel
{
    /** 
        El modelo puede ser el campo de la tabla setTable

     */
    public static function generateReference($entity, $modelo)
    {
        if ($entity->isNew() && !$entity->ref) {
            $tableInstance = TableRegistry::getTableLocator()->get(ucfirst($modelo));
            $count = $tableInstance->find()->count();
            $entity->ref = substr(strtoupper($modelo), 0, 3) . '-' . str_pad($count + 1, 4, '0', STR_PAD_LEFT);
        }
    }

    public static function generateSlug($entity)
    {
        if ($entity->isNew() && !$entity->slug) {
            $entity->slug = 'S' . $entity->ref;
        }
    }
}
