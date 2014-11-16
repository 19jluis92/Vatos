<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $county->id], ['confirm' => __('Are you sure you want to delete # %s?', $county->id)]) ?></li>
		<li><?= $this->Html->link(__('List County'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="county form large-10 medium-9 columns">
<?= $this->Form->create($county) ?>
	<fieldset>
		<legend><?= __('Edit County'); ?></legend>
	<?php
		echo $this->Form->input('Name');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
