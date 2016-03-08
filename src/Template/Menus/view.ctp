<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Links'), ['controller' => 'Links', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Link'), ['controller' => 'Links', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menus view large-9 medium-8 columns content">
    <h3><?= h($menu->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($menu->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Alias') ?></th>
            <td><?= h($menu->alias) ?></td>
        </tr>
        <tr>
            <th><?= __('Class') ?></th>
            <td><?= h($menu->class) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($menu->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= $this->Number->format($menu->weight) ?></td>
        </tr>
        <tr>
            <th><?= __('Link Count') ?></th>
            <td><?= $this->Number->format($menu->link_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Updated') ?></th>
            <td><?= h($menu->updated) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($menu->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($menu->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Status') ?></h4>
        <?= $this->Text->autoParagraph(h($menu->status)); ?>
    </div>
    <div class="row">
        <h4><?= __('Params') ?></h4>
        <?= $this->Text->autoParagraph(h($menu->params)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Links') ?></h4>
        <?php if (!empty($menu->links)): ?>
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
            <?php foreach ($menu->links as $links): ?>
            <tr>
                <td><?= h($links->id) ?></td>
                <td><?= h($links->parent_id) ?></td>
                <td><?= h($links->menu_id) ?></td>
                <td><?= h($links->title) ?></td>
                <td><?= h($links->class) ?></td>
                <td><?= h($links->description) ?></td>
                <td><?= h($links->link) ?></td>
                <td><?= h($links->target) ?></td>
                <td><?= h($links->rel) ?></td>
                <td><?= h($links->status) ?></td>
                <td><?= h($links->lft) ?></td>
                <td><?= h($links->rght) ?></td>
                <td><?= h($links->visibility_roles) ?></td>
                <td><?= h($links->params) ?></td>
                <td><?= h($links->updated) ?></td>
                <td><?= h($links->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Links', 'action' => 'view', $links->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Links', 'action' => 'edit', $links->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Links', 'action' => 'delete', $links->id], ['confirm' => __('Are you sure you want to delete # {0}?', $links->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
