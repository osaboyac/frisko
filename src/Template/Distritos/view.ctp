<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Distrito'), ['action' => 'edit', $distrito->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Distrito'), ['action' => 'delete', $distrito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $distrito->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Distritos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distrito'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Address'), ['controller' => 'Address', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addres'), ['controller' => 'Address', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="distritos view large-9 medium-8 columns content">
    <h3><?= h($distrito->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($distrito->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Provincia') ?></th>
            <td><?= $distrito->has('provincia') ? $this->Html->link($distrito->provincia->id, ['controller' => 'Provincias', 'action' => 'view', $distrito->provincia->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($distrito->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Address') ?></h4>
        <?php if (!empty($distrito->address)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Departamento Id') ?></th>
                <th><?= __('Provincia Id') ?></th>
                <th><?= __('Distrito Id') ?></th>
                <th><?= __('Zona') ?></th>
                <th><?= __('Direccion') ?></th>
                <th><?= __('Socio Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($distrito->address as $address): ?>
            <tr>
                <td><?= h($address->id) ?></td>
                <td><?= h($address->departamento_id) ?></td>
                <td><?= h($address->provincia_id) ?></td>
                <td><?= h($address->distrito_id) ?></td>
                <td><?= h($address->zona) ?></td>
                <td><?= h($address->direccion) ?></td>
                <td><?= h($address->socio_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Address', 'action' => 'view', $address->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Address', 'action' => 'edit', $address->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Address', 'action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
