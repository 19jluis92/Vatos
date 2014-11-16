<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Vehicle'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="vehicle index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('vin') ?></th>
			<th><?= $this->Paginator->sort('idModel') ?></th>
			<th><?= $this->Paginator->sort('idColor') ?></th>
			<th><?= $this->Paginator->sort('year') ?></th>
			<th><?= $this->Paginator->sort('idCarType') ?></th>
			<th><?= $this->Paginator->sort('characteristics') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($vehicle as $vehicle): ?>
		<tr>
			<td><?= $this->Number->format($vehicle->id) ?></td>
			<td><?= h($vehicle->vin) ?></td>
			<td><?= $this->Number->format($vehicle->idModel) ?></td>
			<td><?= $this->Number->format($vehicle->idColor) ?></td>
			<td><?= $this->Number->format($vehicle->year) ?></td>
			<td><?= $this->Number->format($vehicle->idCarType) ?></td>
			<td><?= h($vehicle->characteristics) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $vehicle->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicle->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?>
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
