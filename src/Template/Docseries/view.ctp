<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Docseries'), ['action' => 'edit', $docseries->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Docseries'), ['action' => 'delete', $docseries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $docseries->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Docseries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Docseries'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Documentos'), ['controller' => 'Documentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Documento'), ['controller' => 'Documentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Depositos'), ['controller' => 'Depositos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deposito'), ['controller' => 'Depositos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="docseries view large-9 medium-8 columns content">
    <h3><?= h($docseries->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Documento') ?></th>
            <td><?= $docseries->has('documento') ? $this->Html->link($docseries->documento->nombre, ['controller' => 'Documentos', 'action' => 'view', $docseries->documento->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Deposito') ?></th>
            <td><?= $docseries->has('deposito') ? $this->Html->link($docseries->deposito->nombre, ['controller' => 'Depositos', 'action' => 'view', $docseries->deposito->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($docseries->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Serie') ?></th>
            <td><?= $this->Number->format($docseries->serie) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero') ?></th>
            <td><?= $this->Number->format($docseries->numero) ?></td>
        </tr>
    </table>
</div>
