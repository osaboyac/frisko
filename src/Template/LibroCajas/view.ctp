<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Libro Caja'), ['action' => 'edit', $libroCaja->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Libro Caja'), ['action' => 'delete', $libroCaja->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libroCaja->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Libro Cajas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Libro Caja'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monedas'), ['controller' => 'Monedas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Moneda'), ['controller' => 'Monedas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cajas'), ['controller' => 'Cajas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caja'), ['controller' => 'Cajas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="libroCajas view large-9 medium-8 columns content">
    <h3><?= h($libroCaja->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($libroCaja->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Descripcion') ?></th>
            <td><?= h($libroCaja->descripcion) ?></td>
        </tr>
        <tr>
            <th><?= __('Moneda') ?></th>
            <td><?= $libroCaja->has('moneda') ? $this->Html->link($libroCaja->moneda->nombre, ['controller' => 'Monedas', 'action' => 'view', $libroCaja->moneda->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($libroCaja->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $this->Number->format($libroCaja->estado) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($libroCaja->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($libroCaja->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cajas') ?></h4>
        <?php if (!empty($libroCaja->cajas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Libro Caja Id') ?></th>
                <th><?= __('Deposito Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th><?= __('Fecha') ?></th>
                <th><?= __('Fecha Cierre') ?></th>
                <th><?= __('Saldo Inicial') ?></th>
                <th><?= __('Diferencia') ?></th>
                <th><?= __('Saldo Final') ?></th>
                <th><?= __('Estado') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Updated') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($libroCaja->cajas as $cajas): ?>
            <tr>
                <td><?= h($cajas->id) ?></td>
                <td><?= h($cajas->libro_caja_id) ?></td>
                <td><?= h($cajas->deposito_id) ?></td>
                <td><?= h($cajas->nombre) ?></td>
                <td><?= h($cajas->descripcion) ?></td>
                <td><?= h($cajas->fecha) ?></td>
                <td><?= h($cajas->fecha_cierre) ?></td>
                <td><?= h($cajas->saldo_inicial) ?></td>
                <td><?= h($cajas->diferencia) ?></td>
                <td><?= h($cajas->saldo_final) ?></td>
                <td><?= h($cajas->estado) ?></td>
                <td><?= h($cajas->created) ?></td>
                <td><?= h($cajas->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cajas', 'action' => 'view', $cajas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cajas', 'action' => 'edit', $cajas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cajas', 'action' => 'delete', $cajas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cajas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
