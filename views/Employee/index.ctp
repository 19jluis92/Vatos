<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="employee index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('lastName') ?></th>
			<th><?= $this->Paginator->sort('nss') ?></th>
			<th><?= $this->Paginator->sort('idCity') ?></th>
			<th><?= $this->Paginator->sort('address') ?></th>
			<th><?= $this->Paginator->sort('phone') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($employee as $employee): ?>
		<tr>
			<td><?= $this->Number->format($employee->id) ?></td>
			<td><?= h($employee->name) ?></td>
			<td><?= h($employee->lastName) ?></td>
			<td><?= h($employee->nss) ?></td>
			<td><?= $this->Number->format($employee->idCity) ?></td>
			<td><?= h($employee->address) ?></td>
			<td><?= h($employee->phone) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
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
