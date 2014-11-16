<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Location'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="location form large-10 medium-9 columns">
<?= $this->Form->create($location) ?>
	<fieldset>
		<legend><?= __('Add Location'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('idCarWorkShop');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
