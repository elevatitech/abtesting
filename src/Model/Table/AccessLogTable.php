<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AccessLog Model
 *
 * @method \App\Model\Entity\AccessLog newEmptyEntity()
 * @method \App\Model\Entity\AccessLog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AccessLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AccessLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\AccessLog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AccessLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AccessLog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AccessLog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccessLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccessLog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AccessLog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AccessLog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AccessLog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AccessLogTable extends Table
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

        $this->setTable('access_log');
        //$this->setDisplayField('id');
        //$this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('page')
            ->maxLength('page', 255)
            ->requirePresence('page', 'create')
            ->notEmptyString('page');

        $validator
            ->scalar('version')
            ->maxLength('version', 255)
            ->requirePresence('version', 'create')
            ->notEmptyString('version');

        $validator
            ->scalar('referrer')
            ->maxLength('referrer', 255);

        $validator
            ->scalar('ip')
            ->maxLength('ip', 255);

        $validator
            ->integer('is_view')
            ->notEmptyString('is_view');

        $validator
            ->integer('is_click')
            ->notEmptyString('is_click');

        return $validator;
    }

    public function trackImpression($page, $version, $referrer, $ip)
    {
        $this->insert($page, $version, $referrer, $ip, 1, 0);
    }

    public function trackConversion($page, $version, $referrer, $ip)
    {
        $this->insert($page, $version, $referrer, $ip, 0, 1);
    }

    private function insert($page, $version, $referrer, $ip, $isView, $isClick)
    {
        $query = $this->query();
        $query->insert(['page', 'version', 'referrer', 'ip', 'is_view', 'is_click'])
            ->values([
                'page' => $page,
                'version' => $version,
                'referrer' => $referrer,
                'ip' => $ip,
                'is_view' => $isView,
                'is_click' => $isClick,
            ])
            ->execute();
    }
}
