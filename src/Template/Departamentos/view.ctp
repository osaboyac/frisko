<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Departamento'), ['action' => 'edit', $departamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Departamento'), ['action' => 'delete', $departamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Departamentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Departamento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Address'), ['controller' => 'Address', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addres'), ['controller' => 'Address', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="departamentos view large-9 medium-8 columns content">
    <h3><?= h($departamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($departamento->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($departamento->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Address') ?></h4>
        <?php if (!empty($departamento->address)): ?>
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
            <?php foreach ($departamento->address as $address): ?>
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
    <div class="related">
        <h4><?= __('Related Provincias') ?></h4>
        <?php if (!empty($departamento->provincias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Departamento Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($departamento->provincias as $provincias): ?>
            <tr>
                <td><?= h($provincias->id) ?></td>
                <td><?= h($provincias->nombre) ?></td>
                <td><?= h($provincias->departamento_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Provincias', 'action' => 'view', $provincias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Provincias', 'action' => 'edit', $provincias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Provincias', 'action' => 'delete', $provincias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provincias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
