<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Vehicle'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="vehicle form large-10 medium-9 columns">
<?= $this->Form->create($vehicle) ?>
	<fieldset>
		<legend><?= __('Add Vehicle'); ?></legend>
	<?php
		echo $this->Form->input('vin');
		echo $this->Form->input('idModel');
		echo $this->Form->input('idColor');
		echo $this->Form->input('year');
		echo $this->Form->input('idCarType');
		echo $this->Form->input('characteristics');
		echo $this->Form->input('plates');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
