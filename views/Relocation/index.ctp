<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Relocation'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="relocation index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('relocationDate') ?></th>
			<th><?= $this->Paginator->sort('idEmployee') ?></th>
			<th><?= $this->Paginator->sort('reason') ?></th>
			<th><?= $this->Paginator->sort('idDepartment') ?></th>
			<th><?= $this->Paginator->sort('idService') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($relocation as $relocation): ?>
		<tr>
			<td><?= $this->Number->format($relocation->id) ?></td>
			<td><?= h($relocation->relocationDate) ?></td>
			<td><?= $this->Number->format($relocation->idEmployee) ?></td>
			<td><?= h($relocation->reason) ?></td>
			<td><?= $this->Number->format($relocation->idDepartment) ?></td>
			<td><?= $this->Number->format($relocation->idService) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $relocation->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $relocation->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $relocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relocation->id)]) ?>
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
