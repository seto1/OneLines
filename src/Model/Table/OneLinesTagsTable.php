<?php

namespace OneLines\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class OneLinesTagsTable extends Table
{

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->addBehavior('Timestamp');
    }
}
