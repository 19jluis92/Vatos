<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Workshopphone'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="workshopphone index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('lada') ?></th>
			<th><?= $this->Paginator->sort('area') ?></th>
			<th><?= $this->Paginator->sort('number') ?></th>
			<th><?= $this->Paginator->sort('idCarWorkShop') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($workshopphone as $workshopphone): ?>
		<tr>
			<td><?= $this->Number->format($workshopphone->id) ?></td>
			<td><?= h($workshopphone->lada) ?></td>
			<td><?= h($workshopphone->area) ?></td>
			<td><?= h($workshopphone->number) ?></td>
			<td><?= $this->Number->format($workshopphone->idCarWorkShop) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $workshopphone->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $workshopphone->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workshopphone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workshopphone->id)]) ?>
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
