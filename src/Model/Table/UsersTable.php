<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\ResenasTable&\Cake\ORM\Association\HasMany $Resenas
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('beerapp.Users');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->hasMany('Resenas', [
            'foreignKey' => 'user_id',
        ]);

        $this->belongsToMany('Roles', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'roles_id',
            'joinTable' => 'Users_roles',
            'className' => 'App\Model\Table\RolesTable'
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
            ->scalar('dni')
            ->maxLength('dni', 20)
            ->requirePresence('dni', 'create', 'El DNI es obligatorio')
            ->notEmptyString('dni', 'Por favor, proporciona el DNI')
            ->add('dni', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Este DNI ya está en uso']);

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create', 'El nombre es obligatorio')
            ->notEmptyString('nombre', 'Por favor, proporciona el nombre');

        $validator
            ->scalar('apellidos')
            ->maxLength('apellidos', 100)
            ->requirePresence('apellidos', 'create', 'Los apellidos son obligatorios')
            ->notEmptyString('apellidos', 'Por favor, proporciona los apellidos');

        $validator
            ->email('email')
            ->requirePresence('email', 'create', 'El email electrónico es obligatorio')
            ->notEmptyString('email', 'Por favor, proporciona el email electrónico')
            ->add('email', 'validFormat', ['rule' => 'email', 'message' => 'Por favor, introduce una dirección de email electrónico válida'])
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Este email electrónico ya está en uso']);

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 255)
            ->requirePresence('direccion', 'create', 'La dirección es obligatoria')
            ->notEmptyString('direccion', 'Por favor, proporciona la dirección');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create', 'La contraseña es obligatoria')
            ->notEmptyString('password', 'Por favor, proporciona la contraseña');

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
        $rules->add($rules->isUnique(['dni'], ['message' => 'Este DNI ya está en uso']), ['errorField' => 'dni']);
        $rules->add($rules->isUnique(['email'],  ['message' => 'Este email ya está en uso']), ['errorField' => 'email']);

        return $rules;
    }

    public function isUserAdmin($userId)
    {
        $user = $this->get($userId, ['contain' => ['Roles']]);
        foreach ($user->roles as $role) {
            if ($role->nombre === 'admin') {
                return true;
            }
        }
        return false;
    }
}
