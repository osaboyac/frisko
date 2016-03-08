<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lista Precio'), ['action' => 'edit', $listaPrecio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lista Precio'), ['action' => 'delete', $listaPrecio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listaPrecio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lista Precios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lista Precio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Socios'), ['controller' => 'Socios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Socio'), ['controller' => 'Socios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monedas'), ['controller' => 'Monedas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Moneda'), ['controller' => 'Monedas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulo Precios'), ['controller' => 'ArticuloPrecios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo Precio'), ['controller' => 'ArticuloPrecios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orden Compras'), ['controller' => 'OrdenCompras', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden Compra'), ['controller' => 'OrdenCompras', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="listaPrecios view large-9 medium-8 columns content">
    <h3><?= h($listaPrecio->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Socio') ?></th>
            <td><?= $listaPrecio->has('socio') ? $this->Html->link($listaPrecio->socio->nombre, ['controller' => 'Socios', 'action' => 'view', $listaPrecio->socio->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($listaPrecio->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Moneda') ?></th>
            <td><?= $listaPrecio->has('moneda') ? $this->Html->link($listaPrecio->moneda->nombre, ['controller' => 'Monedas', 'action' => 'view', $listaPrecio->moneda->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($listaPrecio->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Lista') ?></th>
            <td><?= $this->Number->format($listaPrecio->tipo_lista) ?></td>
        </tr>
        <tr>
            <th><?= __('Incluir Impuesto') ?></th>
            <td><?= $this->Number->format($listaPrecio->incluir_impuesto) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $this->Number->format($listaPrecio->estado) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Articulo Precios') ?></h4>
        <?php if (!empty($listaPrecio->articulo_precios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Lista Precio Id') ?></th>
                <th><?= __('Articulo Id') ?></th>
                <th><?= __('Impuesto Id') ?></th>
                <th><?= __('Precio Minimo') ?></th>
                <th><?= __('Precio Estandar') ?></th>
                <th><?= __('Precio Maximo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listaPrecio->articulo_precios as $articuloPrecios): ?>
            <tr>
                <td><?= h($articuloPrecios->id) ?></td>
                <td><?= h($articuloPrecios->lista_precio_id) ?></td>
                <td><?= h($articuloPrecios->articulo_id) ?></td>
                <td><?= h($articuloPrecios->impuesto_id) ?></td>
                <td><?= h($articuloPrecios->precio_minimo) ?></td>
                <td><?= h($articuloPrecios->precio_estandar) ?></td>
                <td><?= h($articuloPrecios->precio_maximo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ArticuloPrecios', 'action' => 'view', $articuloPrecios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ArticuloPrecios', 'action' => 'edit', $articuloPrecios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ArticuloPrecios', 'action' => 'delete', $articuloPrecios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articuloPrecios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orden Compras') ?></h4>
        <?php if (!empty($listaPrecio->orden_compras)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Socio Id') ?></th>
                <th><?= __('Lista Precio Id') ?></th>
                <th><?= __('Fecha') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listaPrecio->orden_compras as $ordenCompras): ?>
            <tr>
                <td><?= h($ordenCompras->id) ?></td>
                <td><?= h($ordenCompras->socio_id) ?></td>
                <td><?= h($ordenCompras->lista_precio_id) ?></td>
                <td><?= h($ordenCompras->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrdenCompras', 'action' => 'view', $ordenCompras->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrdenCompras', 'action' => 'edit', $ordenCompras->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrdenCompras', 'action' => 'delete', $ordenCompras->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordenCompras->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
