<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="client index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('Name') ?></th>
			<th><?= $this->Paginator->sort('LastName') ?></th>
			<th><?= $this->Paginator->sort('RFC') ?></th>
			<th><?= $this->Paginator->sort('Clientcol') ?></th>
			<th><?= $this->Paginator->sort('Clientcol1') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($client as $client): ?>
		<tr>
			<td><?= $this->Number->format($client->id) ?></td>
			<td><?= h($client->Name) ?></td>
			<td><?= h($client->LastName) ?></td>
			<td><?= h($client->RFC) ?></td>
			<td><?= h($client->Clientcol) ?></td>
			<td><?= h($client->Clientcol1) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $client->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
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
