<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientvehicle->idClient], ['confirm' => __('Are you sure you want to delete # %s?', $clientvehicle->idClient)]) ?></li>
		<li><?= $this->Html->link(__('List Clientvehicle'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="clientvehicle form large-10 medium-9 columns">
<?= $this->Form->create($clientvehicle) ?>
	<fieldset>
		<legend><?= __('Edit Clientvehicle'); ?></legend>
	<?php
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
