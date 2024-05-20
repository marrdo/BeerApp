<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cervezas Model
 *
 * @property \App\Model\Table\ResenasTable&\Cake\ORM\Association\HasMany $Resenas
 *
 * @method \App\Model\Entity\Cerveza newEmptyEntity()
 * @method \App\Model\Entity\Cerveza newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cerveza[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cerveza get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cerveza findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cerveza patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cerveza[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cerveza|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cerveza saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cerveza[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cerveza[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cerveza[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cerveza[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CervezasTable extends Table
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

        $this->setTable('Cervezas');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->hasMany('Resenas', [
            'foreignKey' => 'cerveza_id',
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
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('descripcion')
            ->allowEmptyString('descripcion');

        $validator
            ->decimal('precio')
            ->allowEmptyString('precio');

        $validator
            ->integer('stock')
            ->allowEmptyString('stock');

        $validator
            ->decimal('media_valoracion')
            ->allowEmptyString('media_valoracion');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 50)
            ->allowEmptyString('tipo');

        $validator
            ->integer('ibu')
            ->allowEmptyString('ibu');

        $validator
            ->decimal('grados_alcohol')
            ->allowEmptyString('grados_alcohol');

        $validator
            ->scalar('color')
            ->maxLength('color', 50)
            ->allowEmptyString('color');

        $validator
            ->scalar('origen')
            ->maxLength('origen', 50)
            ->allowEmptyString('origen');

        $validator
            ->scalar('familia_estilos')
            ->maxLength('familia_estilos', 50)
            ->allowEmptyString('familia_estilos');

        $validator
            ->scalar('sabor_dominante')
            ->maxLength('sabor_dominante', 50)
            ->allowEmptyString('sabor_dominante');

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

        return $rules;
    }
}
