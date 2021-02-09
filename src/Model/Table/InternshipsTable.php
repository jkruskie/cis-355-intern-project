<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class InternshipsTable extends Table
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

        $this->setTable('internships');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Applications', [
            'foreignKey' => 'internship_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('company_name')
            ->maxLength('company_name', 100)
            ->requirePresence('company_name', 'create')
            ->notEmptyString('company_name');

        $validator
            ->scalar('company_location')
            ->maxLength('company_location', 255)
            ->requirePresence('company_location', 'create')
            ->notEmptyString('company_location');

        $validator
            ->scalar('job_type')
            ->maxLength('job_type', 255)
            ->requirePresence('job_type', 'create')
            ->notEmptyString('job_type');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }

    // Return internships based on employers id
    public function findEmployersInternships($id)
    {
        return $this->find()->where([
                'user_id =' => $id]);
    }

        // Return available internships
        public function findAvailableInternships($id)
        {
            return $this->find()->where([
                    'user_id =' => $id]);
        }
}
