<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Model'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="model index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('idBrand') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($model as $model): ?>
		<tr>
			<td><?= $this->Number->format($model->id) ?></td>
			<td><?= h($model->name) ?></td>
			<td><?= $this->Number->format($model->idBrand) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $model->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $model->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $model->id], ['confirm' => __('Are you sure you want to delete # {0}?', $model->id)]) ?>
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
