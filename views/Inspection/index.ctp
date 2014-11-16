<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Inspection'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="inspection index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('idService') ?></th>
			<th><?= $this->Paginator->sort('mileage') ?></th>
			<th><?= $this->Paginator->sort('fuel') ?></th>
			<th><?= $this->Paginator->sort('inspectionDate') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($inspection as $inspection): ?>
		<tr>
			<td><?= $this->Number->format($inspection->id) ?></td>
			<td><?= $this->Number->format($inspection->idService) ?></td>
			<td><?= $this->Number->format($inspection->mileage) ?></td>
			<td><?= $this->Number->format($inspection->fuel) ?></td>
			<td><?= h($inspection->inspectionDate) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $inspection->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $inspection->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inspection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspection->id)]) ?>
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
