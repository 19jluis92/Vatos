<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Clientvehicle'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="clientvehicle index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('idClient') ?></th>
			<th><?= $this->Paginator->sort('idVehicle') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($clientvehicle as $clientvehicle): ?>
		<tr>
			<td><?= $this->Number->format($clientvehicle->idClient) ?></td>
			<td><?= $this->Number->format($clientvehicle->idVehicle) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $clientvehicle->idClient]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientvehicle->idClient]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientvehicle->idClient], ['confirm' => __('Are you sure you want to delete # {0}?', $clientvehicle->idClient)]) ?>
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
