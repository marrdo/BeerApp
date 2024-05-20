<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;
use ArrayObject;
use App\Model\Utilities\UtilitiesModel;

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
    // Array de colores
    public const COLORES = [
        'Pajizo',
        'Amarillo',
        'Dorado',
        'Ámbar',
        'Ámbar profundo/cobrizo claro',
        'Cobrizo',
        'Cobrizo profundo/marrón claro',
        'Marrón',
        'Marrón oscuro',
        'Marrón muy oscuro',
        'Negro',
        'Negro opaco'
    ];

    // Array de tipos

    public const TIPOS = [
        'Ale',
        'Lager'
    ];

    // Array de regiones de origen
    public const REGIONES_ORIGEN = [
        'islas-británicas' => 'Islas Británicas (Inglaterra, Gales, Escocia, Irlanda)',
        'europa-occidental' => 'Europa Occidental (Bélgica, Francia, Países Bajos)',
        'europa-central' => 'Europa Central (Alemania, Austria, República Checa, Escandinavia)',
        'europa-oriental' => 'Europa Oriental (Polonia, Estados Bálticos, Rusia)',
        'norte-américa' => 'Norte América (Estados Unidos, Canadá, México)',
        'sud-américa' => 'Sud América (Argentina, Brasil)',
        'pacífico' => 'Pacífico (Australia, Nueva Zelanda)'
    ];

    // Array de familias de estilos
    public const FAMILIAS_ESTILOS = [
        'familia-ipa',
        'familia-ale-marrón',
        'familia-ale-pálida',
        'familia-lager-pálida',
        'familia-pilsner',
        'familia-ale-ámbar',
        'familia-lager-ámbar',
        'familia-lager-oscura',
        'familia-porter',
        'familia-stout',
        'familia-bock',
        'familia-ale-fuerte',
        'familia-cerveza-trigo',
        'cerveza-especialidad'
    ];

    // Array de sabores
    public const SABORES = [
        'maltosa' => 'Maltosa (sabor predominante a malta)',
        'amarga' => 'Amarga (sabor predominante amargo)',
        'balanceada' => 'Balanceada (intensidad similar de malta y amargor)',
        'lupulada' => 'Lupulada (sabor a lúpulo)',
        'rostizada' => 'Rostizada (granos o maltas rostizadas)',
        'dulce' => 'Dulce (dulzor residual o sabor a azúcar evidentes)',
        'ahumada' => 'Ahumada (sabor a malta o granos ahumados)',
        'ácida' => 'Ácida (carácter agrio o acidez intencionalmente elevada evidentes)',
        'madera' => 'Madera (carácter a añejamiento con madera o en barrica)',
        'fruta' => 'Fruta (sabor o aroma a fruta evidentes)',
        'especias' => 'Especias (sabor o aroma a especias evidentes)'
    ];

    public function beforeMarshal(EventInterface $event, ArrayObject $data, ArrayObject $options)
    {
        foreach ($data as $key => $value) {
            // Verificar si el valor es una cadena de texto
            if (is_string($value)) {
                // Eliminar los espacios en blanco antes y después del valor
                $data[$key] = trim($value);
            }
        }
    }
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

        $this->belongsToMany('Users', [
            'foreignKey' => 'cerveza_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'Resenas',
            'className' => 'App\Model\Table\UsersTable'
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
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create',  __('El nombre de la cerveza es obligatorio'))
            ->notEmptyString('nombre', __('Por favor, proporciona un nombre para la cerveza'));

        $validator
            ->scalar('descripcion')
            ->allowEmptyString('descripcion', __('Este campo puede quedar vacío'));

        $validator
            ->decimal('precio')
            ->allowEmptyString('precio', __('Este campo puede quedar vacío'));

        $validator
            ->integer('stock')
            ->allowEmptyString('stock', __('Este campo puede quedar vacío'));

        $validator
            ->decimal('media_valoracion')
            ->allowEmptyString('media_valoracion', __('Este campo puede quedar vacío'));

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 50)
            ->allowEmptyString('tipo', __('Este campo puede quedar vacío'));

        $validator
            ->integer('ibu')
            ->allowEmptyString('ibu', __('Este campo puede quedar vacío'));

        $validator
            ->decimal('grados_alcohol')
            ->allowEmptyString('grados_alcohol', __('Este campo puede quedar vacío'));

        $validator
            ->scalar('color')
            ->maxLength('color', 50)
            ->allowEmptyString('color', __('Este campo puede quedar vacío'));

        $validator
            ->scalar('origen')
            ->maxLength('origen', 50)
            ->allowEmptyString('origen', __('Este campo puede quedar vacío'));

        $validator
            ->scalar('familia_estilos')
            ->maxLength('familia_estilos', 50)
            ->allowEmptyString('familia_estilos', __('Este campo puede quedar vacío'));

        $validator
            ->scalar('sabor_dominante')
            ->maxLength('sabor_dominante', 50)
            ->allowEmptyString('sabor_dominante', __('Este campo puede quedar vacío'));

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
        $rules->add($rules->isUnique(['ref'],  ['message' => __('El campo referencia debe ser único.')]), ['errorField' => 'ref']);
        $rules->add($rules->isUnique(['slug'], ['message' => __('El campo slug debe ser único.')]), ['errorField' => 'slug']);

        return $rules;
    }
}
