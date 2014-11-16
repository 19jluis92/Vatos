<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Userrole'), ['action' => 'add']) ?></li>
	</ul>
</div>
<div class="userrole index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('idUser') ?></th>
			<th><?= $this->Paginator->sort('idRole') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($userrole as $userrole): ?>
		<tr>
			<td><?= $this->Number->format($userrole->idUser) ?></td>
			<td><?= $this->Number->format($userrole->idRole) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $userrole->idUser]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $userrole->idUser]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userrole->idUser], ['confirm' => __('Are you sure you want to delete # {0}?', $userrole->idUser)]) ?>
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
