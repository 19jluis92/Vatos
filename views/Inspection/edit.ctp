<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inspection->id], ['confirm' => __('Are you sure you want to delete # %s?', $inspection->id)]) ?></li>
		<li><?= $this->Html->link(__('List Inspection'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="inspection form large-10 medium-9 columns">
<?= $this->Form->create($inspection) ?>
	<fieldset>
		<legend><?= __('Edit Inspection'); ?></legend>
	<?php
		echo $this->Form->input('idService');
		echo $this->Form->input('mileage');
		echo $this->Form->input('fuel');
		echo $this->Form->input('inspectionDate');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
