<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Link'), ['action' => 'edit', $link->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Link'), ['action' => 'delete', $link->id], ['confirm' => __('Are you sure you want to delete # {0}?', $link->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Links'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Link'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Links'), ['controller' => 'Links', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Link'), ['controller' => 'Links', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="links view large-9 medium-8 columns content">
    <h3><?= h($link->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parent Link') ?></th>
            <td><?= $link->has('parent_link') ? $this->Html->link($link->parent_link->title, ['controller' => 'Links', 'action' => 'view', $link->parent_link->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Menu') ?></th>
            <td><?= $link->has('menu') ? $this->Html->link($link->menu->title, ['controller' => 'Menus', 'action' => 'view', $link->menu->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($link->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Class') ?></th>
            <td><?= h($link->class) ?></td>
        </tr>
        <tr>
            <th><?= __('Link') ?></th>
            <td><?= h($link->link) ?></td>
        </tr>
        <tr>
            <th><?= __('Target') ?></th>
            <td><?= h($link->target) ?></td>
        </tr>
        <tr>
            <th><?= __('Rel') ?></th>
            <td><?= h($link->rel) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($link->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($link->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($link->rght) ?></td>
        </tr>
        <tr>
            <th><?= __('Updated') ?></th>
            <td><?= h($link->updated) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($link->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($link->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Status') ?></h4>
        <?= $this->Text->autoParagraph(h($link->status)); ?>
    </div>
    <div class="row">
        <h4><?= __('Visibility Roles') ?></h4>
        <?= $this->Text->autoParagraph(h($link->visibility_roles)); ?>
    </div>
    <div class="row">
        <h4><?= __('Params') ?></h4>
        <?= $this->Text->autoParagraph(h($link->params)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Links') ?></h4>
        <?php if (!empty($link->child_links)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Menu Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Class') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Link') ?></th>
                <th><?= __('Target') ?></th>
                <th><?= __('Rel') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Visibility Roles') ?></th>
                <th><?= __('Params') ?></th>
                <th><?= __('Updated') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($link->child_links as $childLinks): ?>
            <tr>
                <td><?= h($childLinks->id) ?></td>
                <td><?= h($childLinks->parent_id) ?></td>
                <td><?= h($childLinks->menu_id) ?></td>
                <td><?= h($childLinks->title) ?></td>
                <td><?= h($childLinks->class) ?></td>
                <td><?= h($childLinks->description) ?></td>
                <td><?= h($childLinks->link) ?></td>
                <td><?= h($childLinks->target) ?></td>
                <td><?= h($childLinks->rel) ?></td>
                <td><?= h($childLinks->status) ?></td>
                <td><?= h($childLinks->lft) ?></td>
                <td><?= h($childLinks->rght) ?></td>
                <td><?= h($childLinks->visibility_roles) ?></td>
                <td><?= h($childLinks->params) ?></td>
                <td><?= h($childLinks->updated) ?></td>
                <td><?= h($childLinks->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Links', 'action' => 'view', $childLinks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Links', 'action' => 'edit', $childLinks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Links', 'action' => 'delete', $childLinks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childLinks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
