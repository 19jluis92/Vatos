<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Carworkshop'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="carworkshop index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('address') ?></th>
			<th><?= $this->Paginator->sort('idCity') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($carworkshop as $carworkshop): ?>
		<tr>
			<td><?= $this->Number->format($carworkshop->id) ?></td>
			<td><?= h($carworkshop->name) ?></td>
			<td><?= h($carworkshop->address) ?></td>
			<td><?= $this->Number->format($carworkshop->idCity) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $carworkshop->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $carworkshop->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carworkshop->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carworkshop->id)]) ?>
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
