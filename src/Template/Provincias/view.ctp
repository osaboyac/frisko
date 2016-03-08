<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Provincia'), ['action' => 'edit', $provincia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Provincia'), ['action' => 'delete', $provincia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provincia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Provincias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provincia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departamentos'), ['controller' => 'Departamentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Departamento'), ['controller' => 'Departamentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Address'), ['controller' => 'Address', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addres'), ['controller' => 'Address', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Distritos'), ['controller' => 'Distritos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distrito'), ['controller' => 'Distritos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="provincias view large-9 medium-8 columns content">
    <h3><?= h($provincia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($provincia->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Departamento') ?></th>
            <td><?= $provincia->has('departamento') ? $this->Html->link($provincia->departamento->id, ['controller' => 'Departamentos', 'action' => 'view', $provincia->departamento->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($provincia->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Address') ?></h4>
        <?php if (!empty($provincia->address)): ?>
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
            <?php foreach ($provincia->address as $address): ?>
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
        <h4><?= __('Related Distritos') ?></h4>
        <?php if (!empty($provincia->distritos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Provincia Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($provincia->distritos as $distritos): ?>
            <tr>
                <td><?= h($distritos->id) ?></td>
                <td><?= h($distritos->nombre) ?></td>
                <td><?= h($distritos->provincia_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Distritos', 'action' => 'view', $distritos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Distritos', 'action' => 'edit', $distritos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Distritos', 'action' => 'delete', $distritos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $distritos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
