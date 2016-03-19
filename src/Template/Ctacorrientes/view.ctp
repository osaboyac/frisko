<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ctacorriente'), ['action' => 'edit', $ctacorriente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ctacorriente'), ['action' => 'delete', $ctacorriente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ctacorriente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ctacorrientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ctacorriente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bancos'), ['controller' => 'Bancos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Banco'), ['controller' => 'Bancos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Depositos'), ['controller' => 'Depositos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deposito'), ['controller' => 'Depositos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Socios'), ['controller' => 'Socios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Socio'), ['controller' => 'Socios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monedas'), ['controller' => 'Monedas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Moneda'), ['controller' => 'Monedas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ctacorrientes view large-9 medium-8 columns content">
    <h3><?= h($ctacorriente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Banco') ?></th>
            <td><?= $ctacorriente->has('banco') ? $this->Html->link($ctacorriente->banco->nombre, ['controller' => 'Bancos', 'action' => 'view', $ctacorriente->banco->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Deposito') ?></th>
            <td><?= $ctacorriente->has('deposito') ? $this->Html->link($ctacorriente->deposito->nombre, ['controller' => 'Depositos', 'action' => 'view', $ctacorriente->deposito->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Socio') ?></th>
            <td><?= $ctacorriente->has('socio') ? $this->Html->link($ctacorriente->socio->nombre, ['controller' => 'Socios', 'action' => 'view', $ctacorriente->socio->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Moneda') ?></th>
            <td><?= $ctacorriente->has('moneda') ? $this->Html->link($ctacorriente->moneda->nombre, ['controller' => 'Monedas', 'action' => 'view', $ctacorriente->moneda->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ctacorriente->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($ctacorriente->tipo) ?></td>
        </tr>
    </table>
</div>
