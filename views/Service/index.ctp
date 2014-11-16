<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="service index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('startDate') ?></th>
			<th><?= $this->Paginator->sort('endDate') ?></th>
			<th><?= $this->Paginator->sort('idCarWorkShop') ?></th>
			<th><?= $this->Paginator->sort('idVehicle') ?></th>
			<th><?= $this->Paginator->sort('idEmployee') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($service as $service): ?>
		<tr>
			<td><?= $this->Number->format($service->id) ?></td>
			<td><?= h($service->startDate) ?></td>
			<td><?= h($service->endDate) ?></td>
			<td><?= $this->Number->format($service->idCarWorkShop) ?></td>
			<td><?= $this->Number->format($service->idVehicle) ?></td>
			<td><?= $this->Number->format($service->idEmployee) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $service->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'));
			echo $this->Paginator->numbers();
			echo $this->Paginator->next(__('next') . ' >');
		?>
		</ul>
		<p><?= $this->Paginator->counter() ?></p>
	</div>
</div>
