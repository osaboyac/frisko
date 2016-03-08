<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Banco'), ['action' => 'edit', $banco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Banco'), ['action' => 'delete', $banco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bancos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Banco'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ctacorrientes'), ['controller' => 'Ctacorrientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ctacorriente'), ['controller' => 'Ctacorrientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bancos view large-9 medium-8 columns content">
    <h3><?= h($banco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($banco->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Descripción') ?></th>
            <td><?= h($banco->descripción) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($banco->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ctacorrientes') ?></h4>
        <?php if (!empty($banco->ctacorrientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Banco Id') ?></th>
                <th><?= __('Socio Id') ?></th>
                <th><?= __('Moneda Id') ?></th>
                <th><?= __('Tipo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($banco->ctacorrientes as $ctacorrientes): ?>
            <tr>
                <td><?= h($ctacorrientes->id) ?></td>
                <td><?= h($ctacorrientes->banco_id) ?></td>
                <td><?= h($ctacorrientes->socio_id) ?></td>
                <td><?= h($ctacorrientes->moneda_id) ?></td>
                <td><?= h($ctacorrientes->tipo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ctacorrientes', 'action' => 'view', $ctacorrientes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ctacorrientes', 'action' => 'edit', $ctacorrientes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ctacorrientes', 'action' => 'delete', $ctacorrientes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ctacorrientes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
