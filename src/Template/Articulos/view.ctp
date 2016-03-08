<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articulo'), ['action' => 'edit', $articulo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articulo'), ['action' => 'delete', $articulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artfamilias'), ['controller' => 'Artfamilias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artfamilia'), ['controller' => 'Artfamilias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artmarcas'), ['controller' => 'Artmarcas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artmarca'), ['controller' => 'Artmarcas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Umedidas'), ['controller' => 'Umedidas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Umedida'), ['controller' => 'Umedidas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Impuestos'), ['controller' => 'Impuestos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Impuesto'), ['controller' => 'Impuestos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articulos view large-9 medium-8 columns content">
    <h3><?= h($articulo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Artfamilia') ?></th>
            <td><?= $articulo->has('artfamilia') ? $this->Html->link($articulo->artfamilia->nombre, ['controller' => 'Artfamilias', 'action' => 'view', $articulo->artfamilia->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Artmarca') ?></th>
            <td><?= $articulo->has('artmarca') ? $this->Html->link($articulo->artmarca->nombre, ['controller' => 'Artmarcas', 'action' => 'view', $articulo->artmarca->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Umedida') ?></th>
            <td><?= $articulo->has('umedida') ? $this->Html->link($articulo->umedida->simbolo, ['controller' => 'Umedidas', 'action' => 'view', $articulo->umedida->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Impuesto') ?></th>
            <td><?= $articulo->has('impuesto') ? $this->Html->link($articulo->impuesto->nombre, ['controller' => 'Impuestos', 'action' => 'view', $articulo->impuesto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Codigo') ?></th>
            <td><?= h($articulo->codigo) ?></td>
        </tr>
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($articulo->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Descripcion') ?></th>
            <td><?= h($articulo->descripcion) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($articulo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($articulo->tipo) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $this->Number->format($articulo->estado) ?></td>
        </tr>
    </table>
</div>
