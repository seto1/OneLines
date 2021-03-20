<?php echo $this->Html->css('OneLines./css/style.css') ?>
<?php echo $this->BcBaser->js('OneLines./js/script.js') ?>

<?php echo $this->BcAdminForm->create(null, [
    'style' => 'margin-bottom: 20px',
    'templates' => [
        'submitContainer' => '{{content}}',
    ],
]) ?>
    <?php echo $this->BcAdminForm->input('text', [
        'type' => 'input',
        'class' => 'bca-textbox__input one-lines__text-input',
        'style' => 'width: 500px',
        'placeholder' => 'テキスト',
    ]) ?>
    <?php echo $this->BcAdminForm->input('tags', [
        'type' => 'input',
        'class' => 'bca-textbox__input one-lines__tag-input flexdatalist',
        'style' => 'width: 200px',
        'placeholder' => 'タグ',
        'multiple' => 'multiple',
        'list' => 'l',
    ]) ?>
    <?php echo $this->BcAdminForm->submit('追加', [
        'div' => 'false',
        'class' => 'bca-btn',
        'data-bca-btn-type' => 'save',
    ]) ?>
    <div class="one-lines__tag-suggest">
        <?php foreach ($tags as $tag): ?>
            <div class="one-lines__tag-suggest-tag">#<?php echo h($tag) ?></div>
        <?php endforeach ?>
    </div>
<?php echo $this->BcAdminForm->end() ?>


<div id="DataList" class="bca-data-list">
    <table class="list-table bca-table-listup" id="ListTable">
        <thead class="bca-table-listup__thead">
        <tr>
            <th class="bca-table-listup__thead-th">
                テキスト
            </th>
            <th class="bca-table-listup__thead-th" style="width: 200px">
                タグ
            </th>
            <th class="bca-table-listup__thead-th" style="width: 200px">
                投稿日
            </th>
        </tr>
        </thead>
        <tbody class="bca-table-listup__tbody">
            <?php if (count($posts)): ?>
                <?php foreach($posts as $post): ?>
                    <tr class="bca-table-listup__tbody-tr">
                        <td class="bca-table-listup__tbody-td">
                            <?php echo h($post->text) ?>
                        </td>
                        <td class="bca-table-listup__tbody-td">
                            <?php foreach ($post->one_lines_tags as $tag): ?>
                                <?php echo h($tag->name) ?>
                            <?php endforeach ?>
                        </td>
                        <td class="bca-table-listup__tbody-td">
                            <?php echo h(date('Y-m-d H:i:s', strtotime($post->created))) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td
                        colspan="3"
                        class="bca-table-listup__tbody-td"
                    ><p class="no-data"><?php echo __d('baser', 'データが見つかりませんでした。') ?></p></td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
