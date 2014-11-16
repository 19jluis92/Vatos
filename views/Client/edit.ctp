<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # %s?', $client->id)]) ?></li>
		<li><?= $this->Html->link(__('List Client'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="client form large-10 medium-9 columns">
<?= $this->Form->create($client) ?>
	<fieldset>
		<legend><?= __('Edit Client'); ?></legend>
	<?php
		echo $this->Form->input('Name');
		echo $this->Form->input('LastName');
		echo $this->Form->input('RFC');
		echo $this->Form->input('Clientcol');
		echo $this->Form->input('Clientcol1');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
