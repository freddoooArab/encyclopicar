<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InformationsCars Model
 *
 * @property \App\Model\Table\CarsTable&\Cake\ORM\Association\BelongsTo $Cars
 * @property \App\Model\Table\InformationsTable&\Cake\ORM\Association\BelongsTo $Informations
 *
 * @method \App\Model\Entity\InformationsCar get($primaryKey, $options = [])
 * @method \App\Model\Entity\InformationsCar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InformationsCar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InformationsCar|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InformationsCar saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InformationsCar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InformationsCar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InformationsCar findOrCreate($search, callable $callback = null, $options = [])
 */
class InformationsCarsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('informations_cars');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cars', [
            'foreignKey' => 'cars_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Informations', [
            'foreignKey' => 'informations_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cars_id'], 'Cars'));
        $rules->add($rules->existsIn(['informations_id'], 'Informations'));

        return $rules;
    }
}
