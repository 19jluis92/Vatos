<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $department->id], ['confirm' => __('Are you sure you want to delete # %s?', $department->id)]) ?></li>
		<li><?= $this->Html->link(__('List Department'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="department form large-10 medium-9 columns">
<?= $this->Form->create($department) ?>
	<fieldset>
		<legend><?= __('Edit Department'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('idLocation');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
