<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Clientvehicle'), ['action' => 'edit', $clientvehicle->idClient]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Clientvehicle'), ['action' => 'delete', $clientvehicle->idClient], ['confirm' => __('Are you sure you want to delete # %s?', $clientvehicle->idClient)]) ?> </li>
		<li><?= $this->Html->link(__('List Clientvehicle'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Clientvehicle'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="clientvehicle view large-10 medium-9 columns">
	<h2><?= h($clientvehicle->idClient) ?></h2>
	<div class="row">
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('IdClient') ?></h6>
			<p><?= $this->Number->format($clientvehicle->idClient) ?></p>
			<h6 class="subheader"><?= __('IdVehicle') ?></h6>
			<p><?= $this->Number->format($clientvehicle->idVehicle) ?></p>
		</div>
	</div>
</div>
