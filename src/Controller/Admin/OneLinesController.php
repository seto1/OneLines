<?php

namespace OneLines\Controller\Admin;

use BaserCore\Controller\Admin\BcAdminAppController;

class OneLinesController extends BcAdminAppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel('OneLines.OneLinesTags');

        $this->viewBuilder()
            ->addHelper('BaserCore.BcForm')
            ->addHelper('BaserCore.BcListTable');

        $this->setTitle('OneLines');
    }

    public function index()
    {
        if ($this->request->is('post')) {
            $saveData = $this->request->getData();
            if ($saveData['tags']) {
                $saveData['one_lines_tags'] = [];
                $tags =  explode(',', $saveData['tags']);
                $tags = array_unique($tags);
                foreach ($tags as $tag) {
                    $tag = trim($tag);
                    if ($tag) {
                        $saveData['one_lines_tags'][] = ['name' => $tag];
                    }
                }
                unset($saveData['tags']);
            }

            $oneLine = $this->OneLines->newEntity($saveData, [
                'associated' => ['OneLinesTags'],
            ]);
            if ($this->OneLines->save($oneLine)) {
                $this->BcMessage->setSuccess('保存しました。');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->BcMessage->setError('保存に失敗しました。');
            }
        }

        $posts = $this->OneLines->find('all', [
            'order' => ['id' => 'desc'],
        ])->contain('OneLinesTags')->all();

        $tags = $this->OneLinesTags->find('list', [
            'order' => ['id' => 'desc'],
            'limit' => 20,
            'keyField' => 'id',
            'valueField' => 'name',
        ])->distinct(['name'])->toArray();

        $this->set('posts', $posts);
        $this->set('tags', $tags);
    }

}
