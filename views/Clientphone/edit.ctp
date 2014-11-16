<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientphone->id], ['confirm' => __('Are you sure you want to delete # %s?', $clientphone->id)]) ?></li>
		<li><?= $this->Html->link(__('List Clientphone'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="clientphone form large-10 medium-9 columns">
<?= $this->Form->create($clientphone) ?>
	<fieldset>
		<legend><?= __('Edit Clientphone'); ?></legend>
	<?php
		echo $this->Form->input('lada');
		echo $this->Form->input('area');
		echo $this->Form->input('number');
		echo $this->Form->input('idClient');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
