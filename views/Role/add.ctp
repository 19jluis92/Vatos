<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Role'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="role form large-10 medium-9 columns">
<?= $this->Form->create($role) ?>
	<fieldset>
		<legend><?= __('Add Role'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
