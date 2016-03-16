<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cargo'), ['action' => 'edit', $cargo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cargo'), ['action' => 'delete', $cargo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cargo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cargos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cargo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Socios'), ['controller' => 'Socios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Socio'), ['controller' => 'Socios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Impuestos'), ['controller' => 'Impuestos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Impuesto'), ['controller' => 'Impuestos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cajas Movimientos'), ['controller' => 'CajasMovimientos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cajas Movimiento'), ['controller' => 'CajasMovimientos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cargos view large-9 medium-8 columns content">
    <h3><?= h($cargo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Socio') ?></th>
            <td><?= $cargo->has('socio') ? $this->Html->link($cargo->socio->nombre, ['controller' => 'Socios', 'action' => 'view', $cargo->socio->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Impuesto') ?></th>
            <td><?= $cargo->has('impuesto') ? $this->Html->link($cargo->impuesto->nombre, ['controller' => 'Impuestos', 'action' => 'view', $cargo->impuesto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($cargo->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($cargo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Incluir Impuesto') ?></th>
            <td><?= $this->Number->format($cargo->incluir_impuesto) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($cargo->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $this->Number->format($cargo->estado) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($cargo->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($cargo->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cajas Movimientos') ?></h4>
        <?php if (!empty($cargo->cajas_movimientos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Caja Id') ?></th>
                <th><?= __('Tipo Efectivo Id') ?></th>
                <th><?= __('Compra Id') ?></th>
                <th><?= __('Venta Id') ?></th>
                <th><?= __('Cargo Id') ?></th>
                <th><?= __('Moneda Id') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th><?= __('Tipo Cambio') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Updated') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cargo->cajas_movimientos as $cajasMovimientos): ?>
            <tr>
                <td><?= h($cajasMovimientos->id) ?></td>
                <td><?= h($cajasMovimientos->caja_id) ?></td>
                <td><?= h($cajasMovimientos->tipo_efectivo_id) ?></td>
                <td><?= h($cajasMovimientos->compra_id) ?></td>
                <td><?= h($cajasMovimientos->venta_id) ?></td>
                <td><?= h($cajasMovimientos->cargo_id) ?></td>
                <td><?= h($cajasMovimientos->moneda_id) ?></td>
                <td><?= h($cajasMovimientos->descripcion) ?></td>
                <td><?= h($cajasMovimientos->tipo_cambio) ?></td>
                <td><?= h($cajasMovimientos->total) ?></td>
                <td><?= h($cajasMovimientos->created) ?></td>
                <td><?= h($cajasMovimientos->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CajasMovimientos', 'action' => 'view', $cajasMovimientos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CajasMovimientos', 'action' => 'edit', $cajasMovimientos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CajasMovimientos', 'action' => 'delete', $cajasMovimientos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cajasMovimientos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
