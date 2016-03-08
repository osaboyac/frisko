<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Forma Pago'), ['action' => 'edit', $formaPago->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Forma Pago'), ['action' => 'delete', $formaPago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formaPago->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Forma Pagos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Forma Pago'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orden Ventas'), ['controller' => 'OrdenVentas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden Venta'), ['controller' => 'OrdenVentas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ventas'), ['controller' => 'Ventas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venta'), ['controller' => 'Ventas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formaPagos view large-9 medium-8 columns content">
    <h3><?= h($formaPago->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($formaPago->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($formaPago->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($formaPago->cantidad) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orden Ventas') ?></h4>
        <?php if (!empty($formaPago->orden_ventas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Deposito Id') ?></th>
                <th><?= __('Socio Id') ?></th>
                <th><?= __('Forma Pago Id') ?></th>
                <th><?= __('Fecha') ?></th>
                <th><?= __('Estado') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formaPago->orden_ventas as $ordenVentas): ?>
            <tr>
                <td><?= h($ordenVentas->id) ?></td>
                <td><?= h($ordenVentas->user_id) ?></td>
                <td><?= h($ordenVentas->deposito_id) ?></td>
                <td><?= h($ordenVentas->socio_id) ?></td>
                <td><?= h($ordenVentas->forma_pago_id) ?></td>
                <td><?= h($ordenVentas->fecha) ?></td>
                <td><?= h($ordenVentas->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrdenVentas', 'action' => 'view', $ordenVentas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrdenVentas', 'action' => 'edit', $ordenVentas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrdenVentas', 'action' => 'delete', $ordenVentas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordenVentas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ventas') ?></h4>
        <?php if (!empty($formaPago->ventas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Socio Id') ?></th>
                <th><?= __('Documento Id') ?></th>
                <th><?= __('Deposito Id') ?></th>
                <th><?= __('Forma Pago Id') ?></th>
                <th><?= __('Fecha') ?></th>
                <th><?= __('Serie') ?></th>
                <th><?= __('Numero') ?></th>
                <th><?= __('Estado') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formaPago->ventas as $ventas): ?>
            <tr>
                <td><?= h($ventas->id) ?></td>
                <td><?= h($ventas->user_id) ?></td>
                <td><?= h($ventas->socio_id) ?></td>
                <td><?= h($ventas->documento_id) ?></td>
                <td><?= h($ventas->deposito_id) ?></td>
                <td><?= h($ventas->forma_pago_id) ?></td>
                <td><?= h($ventas->fecha) ?></td>
                <td><?= h($ventas->serie) ?></td>
                <td><?= h($ventas->numero) ?></td>
                <td><?= h($ventas->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ventas', 'action' => 'view', $ventas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ventas', 'action' => 'edit', $ventas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ventas', 'action' => 'delete', $ventas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ventas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
