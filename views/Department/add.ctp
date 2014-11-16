<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Department'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="department form large-10 medium-9 columns">
<?= $this->Form->create($department) ?>
	<fieldset>
		<legend><?= __('Add Department'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('idLocation');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
