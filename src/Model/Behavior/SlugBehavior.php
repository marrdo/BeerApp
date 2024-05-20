<?php
namespace App\Model\Behavior;

use Cake\Event\EventInterface;
use Cake\ORM\Behavior;
use Cake\Utility\Text;

class SlugBehavior extends Behavior
{
    protected $_defaultConfig = [
        'sourceField' => 'ref', // Campo fuente para generar el slug
        'targetField' => 'slug' // Campo donde se almacenará el slug
    ];

    public function initialize(array $config): void
    {
        parent::initialize($config);
    }

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        $sourceField = $this->getConfig('sourceField');
        $targetField = $this->getConfig('targetField');

        if ($entity->isNew() || $entity->isDirty($sourceField)) {
            $slug = Text::slug($entity->get($sourceField));
            $entity->set($targetField, $slug);
        }
    }
}
