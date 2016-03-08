<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articulo Precio'), ['action' => 'edit', $articuloPrecio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articulo Precio'), ['action' => 'delete', $articuloPrecio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articuloPrecio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articulo Precios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo Precio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lista Precios'), ['controller' => 'ListaPrecios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lista Precio'), ['controller' => 'ListaPrecios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Impuestos'), ['controller' => 'Impuestos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Impuesto'), ['controller' => 'Impuestos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articuloPrecios view large-9 medium-8 columns content">
    <h3><?= h($articuloPrecio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Lista Precio') ?></th>
            <td><?= $articuloPrecio->has('lista_precio') ? $this->Html->link($articuloPrecio->lista_precio->nombre, ['controller' => 'ListaPrecios', 'action' => 'view', $articuloPrecio->lista_precio->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Articulo') ?></th>
            <td><?= $articuloPrecio->has('articulo') ? $this->Html->link($articuloPrecio->articulo->nombre, ['controller' => 'Articulos', 'action' => 'view', $articuloPrecio->articulo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Impuesto') ?></th>
            <td><?= $articuloPrecio->has('impuesto') ? $this->Html->link($articuloPrecio->impuesto->nombre, ['controller' => 'Impuestos', 'action' => 'view', $articuloPrecio->impuesto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($articuloPrecio->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Precio Minimo') ?></th>
            <td><?= $this->Number->format($articuloPrecio->precio_minimo) ?></td>
        </tr>
        <tr>
            <th><?= __('Precio Estandar') ?></th>
            <td><?= $this->Number->format($articuloPrecio->precio_estandar) ?></td>
        </tr>
        <tr>
            <th><?= __('Precio Maximo') ?></th>
            <td><?= $this->Number->format($articuloPrecio->precio_maximo) ?></td>
        </tr>
    </table>
</div>
