<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List City'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="city form large-10 medium-9 columns">
<?= $this->Form->create($city) ?>
	<fieldset>
		<legend><?= __('Add City'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('idState');
		echo $this->Form->input('Citycol');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
