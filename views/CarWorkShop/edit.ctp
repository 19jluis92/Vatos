<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carworkshop->id], ['confirm' => __('Are you sure you want to delete # %s?', $carworkshop->id)]) ?></li>
		<li><?= $this->Html->link(__('List Carworkshop'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="carworkshop form large-10 medium-9 columns">
<?= $this->Form->create($carworkshop) ?>
	<fieldset>
		<legend><?= __('Edit Carworkshop'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('idCity');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
