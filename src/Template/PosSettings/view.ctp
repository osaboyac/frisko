<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pos Setting'), ['action' => 'edit', $posSetting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pos Setting'), ['action' => 'delete', $posSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posSetting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pos Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pos Setting'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Depositos'), ['controller' => 'Depositos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deposito'), ['controller' => 'Depositos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Docseries'), ['controller' => 'Docseries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Docseries'), ['controller' => 'Docseries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Documentos'), ['controller' => 'Documentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Documento'), ['controller' => 'Documentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cajas'), ['controller' => 'Cajas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caja'), ['controller' => 'Cajas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="posSettings view large-9 medium-8 columns content">
    <h3><?= h($posSetting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $posSetting->has('user') ? $this->Html->link($posSetting->user->username, ['controller' => 'Users', 'action' => 'view', $posSetting->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Deposito') ?></th>
            <td><?= $posSetting->has('deposito') ? $this->Html->link($posSetting->deposito->nombre, ['controller' => 'Depositos', 'action' => 'view', $posSetting->deposito->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Docseries') ?></th>
            <td><?= $posSetting->has('docseries') ? $this->Html->link($posSetting->docseries->id, ['controller' => 'Docseries', 'action' => 'view', $posSetting->docseries->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Documento') ?></th>
            <td><?= $posSetting->has('documento') ? $this->Html->link($posSetting->documento->nombre, ['controller' => 'Documentos', 'action' => 'view', $posSetting->documento->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Caja') ?></th>
            <td><?= $posSetting->has('caja') ? $this->Html->link($posSetting->caja->nombre, ['controller' => 'Cajas', 'action' => 'view', $posSetting->caja->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($posSetting->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Caja Automatico') ?></th>
            <td><?= $this->Number->format($posSetting->caja_automatico) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $this->Number->format($posSetting->estado) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($posSetting->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($posSetting->modified) ?></td>
        </tr>
    </table>
</div>
