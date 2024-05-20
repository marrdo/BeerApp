<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Utilities\UtilitiesModel;

/**
 * Resenas Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CervezasTable&\Cake\ORM\Association\BelongsTo $Cervezas
 *
 * @method \App\Model\Entity\Resena newEmptyEntity()
 * @method \App\Model\Entity\Resena newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Resena[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resena get($primaryKey, $options = [])
 * @method \App\Model\Entity\Resena findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Resena patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Resena[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resena|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resena saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resena[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Resena[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Resena[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Resena[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ResenasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('Resenas');
        $this->setDisplayField('ref');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Cervezas', [
            'foreignKey' => 'cerveza_id',
            'joinType' => 'INNER',
        ]);

        

        $this->getEventManager()->on('Model.beforeSave', function ($event, $entity, $options) {
            UtilitiesModel::generateReference($entity, $this->getAlias());
        });
        $this->addBehavior('Slug', [
            'sourceField' => 'ref', // Campo fuente para generar el slug (en tu caso 'ref')
            'targetField' => 'slug'   // Campo donde se almacenará el slug
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('ref')
            ->maxLength('ref', 20)
            ->requirePresence('ref', 'create')
            ->notEmptyString('ref')
            ->add('ref', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->decimal('calificacion')
            ->requirePresence('calificacion', 'create')
            ->notEmptyString('calificacion');

        $validator
            ->uuid('user_id')
            ->notEmptyString('user_id');

        $validator
            ->uuid('cerveza_id')
            ->notEmptyString('cerveza_id');

        $validator
            ->scalar('comentario')
            ->allowEmptyString('comentario');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['ref']), ['errorField' => 'ref']);
        $rules->add($rules->isUnique(['slug']), ['errorField' => 'slug']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('cerveza_id', 'Cervezas'), ['errorField' => 'cerveza_id']);

        return $rules;
    }
}
