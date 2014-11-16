<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # %s?', $service->id)]) ?></li>
		<li><?= $this->Html->link(__('List Service'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="service form large-10 medium-9 columns">
<?= $this->Form->create($service) ?>
	<fieldset>
		<legend><?= __('Edit Service'); ?></legend>
	<?php
		echo $this->Form->input('startDate');
		echo $this->Form->input('endDate');
		echo $this->Form->input('idCarWorkShop');
		echo $this->Form->input('idVehicle');
		echo $this->Form->input('idEmployee');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
