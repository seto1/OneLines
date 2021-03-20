<?php

namespace OneLines\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class OneLinesTable extends Table
{

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->addBehavior('Timestamp');

        $this->hasMany('OneLines.OneLinesTags')
            ->setForeignKey('one_lines_id');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('text')
            ->maxLength('text', 255, '255文字以内で入力してください。')
            ->notEmptyString('text', '入力してください。');

        return $validator;
    }
}
