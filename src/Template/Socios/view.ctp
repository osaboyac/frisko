<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Socio'), ['action' => 'edit', $socio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Socio'), ['action' => 'delete', $socio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Socios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Socio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Address'), ['controller' => 'Address', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addres'), ['controller' => 'Address', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="socios view large-9 medium-8 columns content">
    <h3><?= h($socio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($socio->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Descripcion') ?></th>
            <td><?= h($socio->descripcion) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefono') ?></th>
            <td><?= h($socio->telefono) ?></td>
        </tr>
        <tr>
            <th><?= __('Movil') ?></th>
            <td><?= h($socio->movil) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($socio->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Website') ?></th>
            <td><?= h($socio->website) ?></td>
        </tr>
        <tr>
            <th><?= __('Contacto') ?></th>
            <td><?= h($socio->contacto) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($socio->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Address Id') ?></th>
            <td><?= $this->Number->format($socio->address_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($socio->tipo) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Address') ?></h4>
        <?php if (!empty($socio->address)): ?>
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
            <?php foreach ($socio->address as $address): ?>
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
        <h4><?= __('Related Usuarios') ?></h4>
        <?php if (!empty($socio->usuarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Role Id') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Estado') ?></th>
                <th><?= __('Socio Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($socio->usuarios as $usuarios): ?>
            <tr>
                <td><?= h($usuarios->id) ?></td>
                <td><?= h($usuarios->role_id) ?></td>
                <td><?= h($usuarios->username) ?></td>
                <td><?= h($usuarios->password) ?></td>
                <td><?= h($usuarios->estado) ?></td>
                <td><?= h($usuarios->socio_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Usuarios', 'action' => 'view', $usuarios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Usuarios', 'action' => 'edit', $usuarios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usuarios', 'action' => 'delete', $usuarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuarios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
