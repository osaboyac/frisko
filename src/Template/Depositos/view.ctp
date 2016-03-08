<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deposito'), ['action' => 'edit', $deposito->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deposito'), ['action' => 'delete', $deposito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deposito->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Depositos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deposito'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Docseries'), ['controller' => 'Docseries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Docseries'), ['controller' => 'Docseries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="depositos view large-9 medium-8 columns content">
    <h3><?= h($deposito->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($deposito->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Direccion') ?></th>
            <td><?= h($deposito->direccion) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefono') ?></th>
            <td><?= h($deposito->telefono) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($deposito->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($deposito->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Docseries') ?></h4>
        <?php if (!empty($deposito->docseries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Documento Id') ?></th>
                <th><?= __('Deposito Id') ?></th>
                <th><?= __('Serie') ?></th>
                <th><?= __('Numero') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($deposito->docseries as $docseries): ?>
            <tr>
                <td><?= h($docseries->id) ?></td>
                <td><?= h($docseries->documento_id) ?></td>
                <td><?= h($docseries->deposito_id) ?></td>
                <td><?= h($docseries->serie) ?></td>
                <td><?= h($docseries->numero) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Docseries', 'action' => 'view', $docseries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Docseries', 'action' => 'edit', $docseries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Docseries', 'action' => 'delete', $docseries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $docseries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
