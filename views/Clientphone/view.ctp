<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Clientphone'), ['action' => 'edit', $clientphone->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Clientphone'), ['action' => 'delete', $clientphone->id], ['confirm' => __('Are you sure you want to delete # %s?', $clientphone->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Clientphone'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Clientphone'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="clientphone view large-10 medium-9 columns">
	<h2><?= h($clientphone->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Lada') ?></h6>
			<p><?= h($clientphone->lada) ?></p>
			<h6 class="subheader"><?= __('Area') ?></h6>
			<p><?= h($clientphone->area) ?></p>
			<h6 class="subheader"><?= __('Number') ?></h6>
			<p><?= h($clientphone->number) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($clientphone->id) ?></p>
			<h6 class="subheader"><?= __('IdClient') ?></h6>
			<p><?= $this->Number->format($clientphone->idClient) ?></p>
		</div>
	</div>
</div>
