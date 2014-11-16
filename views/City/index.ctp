<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="city index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('idState') ?></th>
			<th><?= $this->Paginator->sort('Citycol') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($city as $city): ?>
		<tr>
			<td><?= $this->Number->format($city->id) ?></td>
			<td><?= h($city->name) ?></td>
			<td><?= $this->Number->format($city->idState) ?></td>
			<td><?= h($city->Citycol) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $city->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $city->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?>
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
