<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Cartype'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="cartype index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($cartype as $cartype): ?>
		<tr>
			<td><?= $this->Number->format($cartype->id) ?></td>
			<td><?= h($cartype->name) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $cartype->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $cartype->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cartype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartype->id)]) ?>
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
