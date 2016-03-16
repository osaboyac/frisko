<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Caja'), ['action' => 'edit', $caja->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Caja'), ['action' => 'delete', $caja->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caja->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cajas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caja'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Libro Cajas'), ['controller' => 'LibroCajas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Libro Caja'), ['controller' => 'LibroCajas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Depositos'), ['controller' => 'Depositos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deposito'), ['controller' => 'Depositos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cajas Movimientos'), ['controller' => 'CajasMovimientos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cajas Movimiento'), ['controller' => 'CajasMovimientos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cajas view large-9 medium-8 columns content">
    <h3><?= h($caja->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Libro Caja') ?></th>
            <td><?= $caja->has('libro_caja') ? $this->Html->link($caja->libro_caja->id, ['controller' => 'LibroCajas', 'action' => 'view', $caja->libro_caja->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Deposito') ?></th>
            <td><?= $caja->has('deposito') ? $this->Html->link($caja->deposito->nombre, ['controller' => 'Depositos', 'action' => 'view', $caja->deposito->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($caja->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Descripcion') ?></th>
            <td><?= h($caja->descripcion) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($caja->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Saldo Inicial') ?></th>
            <td><?= $this->Number->format($caja->saldo_inicial) ?></td>
        </tr>
        <tr>
            <th><?= __('Diferencia') ?></th>
            <td><?= $this->Number->format($caja->diferencia) ?></td>
        </tr>
        <tr>
            <th><?= __('Saldo Final') ?></th>
            <td><?= $this->Number->format($caja->saldo_final) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $this->Number->format($caja->estado) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha') ?></th>
            <td><?= h($caja->fecha) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha Cierre') ?></th>
            <td><?= h($caja->fecha_cierre) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($caja->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Updated') ?></th>
            <td><?= h($caja->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cajas Movimientos') ?></h4>
        <?php if (!empty($caja->cajas_movimientos)): ?>
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
            <?php foreach ($caja->cajas_movimientos as $cajasMovimientos): ?>
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
