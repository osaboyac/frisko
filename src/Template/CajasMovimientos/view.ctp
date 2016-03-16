<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cajas Movimiento'), ['action' => 'edit', $cajasMovimiento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cajas Movimiento'), ['action' => 'delete', $cajasMovimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cajasMovimiento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cajas Movimientos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cajas Movimiento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cajas'), ['controller' => 'Cajas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caja'), ['controller' => 'Cajas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Efectivo'), ['controller' => 'TipoEfectivo', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Efectivo'), ['controller' => 'TipoEfectivo', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Compras'), ['controller' => 'Compras', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Compra'), ['controller' => 'Compras', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ventas'), ['controller' => 'Ventas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venta'), ['controller' => 'Ventas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cargos'), ['controller' => 'Cargos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cargo'), ['controller' => 'Cargos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monedas'), ['controller' => 'Monedas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Moneda'), ['controller' => 'Monedas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cajasMovimientos view large-9 medium-8 columns content">
    <h3><?= h($cajasMovimiento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Caja') ?></th>
            <td><?= $cajasMovimiento->has('caja') ? $this->Html->link($cajasMovimiento->caja->id, ['controller' => 'Cajas', 'action' => 'view', $cajasMovimiento->caja->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Efectivo') ?></th>
            <td><?= $cajasMovimiento->has('tipo_efectivo') ? $this->Html->link($cajasMovimiento->tipo_efectivo->id, ['controller' => 'TipoEfectivo', 'action' => 'view', $cajasMovimiento->tipo_efectivo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Compra') ?></th>
            <td><?= $cajasMovimiento->has('compra') ? $this->Html->link($cajasMovimiento->compra->id, ['controller' => 'Compras', 'action' => 'view', $cajasMovimiento->compra->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Venta') ?></th>
            <td><?= $cajasMovimiento->has('venta') ? $this->Html->link($cajasMovimiento->venta->id, ['controller' => 'Ventas', 'action' => 'view', $cajasMovimiento->venta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Cargo') ?></th>
            <td><?= $cajasMovimiento->has('cargo') ? $this->Html->link($cajasMovimiento->cargo->id, ['controller' => 'Cargos', 'action' => 'view', $cajasMovimiento->cargo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Moneda') ?></th>
            <td><?= $cajasMovimiento->has('moneda') ? $this->Html->link($cajasMovimiento->moneda->nombre, ['controller' => 'Monedas', 'action' => 'view', $cajasMovimiento->moneda->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Descripcion') ?></th>
            <td><?= h($cajasMovimiento->descripcion) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($cajasMovimiento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Cambio') ?></th>
            <td><?= $this->Number->format($cajasMovimiento->tipo_cambio) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($cajasMovimiento->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($cajasMovimiento->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Updated') ?></th>
            <td><?= h($cajasMovimiento->updated) ?></td>
        </tr>
    </table>
</div>
