<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Impuesto'), ['action' => 'edit', $impuesto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Impuesto'), ['action' => 'delete', $impuesto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $impuesto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Impuestos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Impuesto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="impuestos view large-9 medium-8 columns content">
    <h3><?= h($impuesto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($impuesto->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Descripcion') ?></th>
            <td><?= h($impuesto->descripcion) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($impuesto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tasa') ?></th>
            <td><?= $this->Number->format($impuesto->tasa) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Articulos') ?></h4>
        <?php if (!empty($impuesto->articulos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Artfamilia Id') ?></th>
                <th><?= __('Artmarca Id') ?></th>
                <th><?= __('Umedida Id') ?></th>
                <th><?= __('Impuesto Id') ?></th>
                <th><?= __('Codigo') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th><?= __('Imagen') ?></th>
                <th><?= __('Tipo') ?></th>
                <th><?= __('Estado') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($impuesto->articulos as $articulos): ?>
            <tr>
                <td><?= h($articulos->id) ?></td>
                <td><?= h($articulos->artfamilia_id) ?></td>
                <td><?= h($articulos->artmarca_id) ?></td>
                <td><?= h($articulos->umedida_id) ?></td>
                <td><?= h($articulos->impuesto_id) ?></td>
                <td><?= h($articulos->codigo) ?></td>
                <td><?= h($articulos->nombre) ?></td>
                <td><?= h($articulos->descripcion) ?></td>
                <td><?= h($articulos->imagen) ?></td>
                <td><?= h($articulos->tipo) ?></td>
                <td><?= h($articulos->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Articulos', 'action' => 'view', $articulos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articulos', 'action' => 'edit', $articulos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articulos', 'action' => 'delete', $articulos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
