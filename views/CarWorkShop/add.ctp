<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Carworkshop'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="carworkshop form large-10 medium-9 columns">
<?= $this->Form->create($carworkshop) ?>
	<fieldset>
		<legend><?= __('Add Carworkshop'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('idCity');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
