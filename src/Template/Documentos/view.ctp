<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Documento'), ['action' => 'edit', $documento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Documento'), ['action' => 'delete', $documento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Documentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Documento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Docseries'), ['controller' => 'Docseries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Docseries'), ['controller' => 'Docseries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="documentos view large-9 medium-8 columns content">
    <h3><?= h($documento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($documento->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Abreviatura') ?></th>
            <td><?= h($documento->abreviatura) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($documento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($documento->tipo) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Docseries') ?></h4>
        <?php if (!empty($documento->docseries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Documento Id') ?></th>
                <th><?= __('Deposito Id') ?></th>
                <th><?= __('Serie') ?></th>
                <th><?= __('Numero') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($documento->docseries as $docseries): ?>
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
