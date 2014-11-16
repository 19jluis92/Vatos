<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Bump'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="bump index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('idPiece') ?></th>
			<th><?= $this->Paginator->sort('idSeverity') ?></th>
			<th><?= $this->Paginator->sort('idInspection') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($bumps as $bump): ?>
		<tr>
			<td><?= $this->Number->format($bump->id) ?></td>
			<td><?= $this->Number->format($bump->idPiece) ?></td>
			<td><?= $this->Number->format($bump->idSeverity) ?></td>
			<td><?= $this->Number->format($bump->idInspection) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $bump->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $bump->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bump->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bump->id)]) ?>
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
