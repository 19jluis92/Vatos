<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # %s?', $location->id)]) ?></li>
		<li><?= $this->Html->link(__('List Location'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="location form large-10 medium-9 columns">
<?= $this->Form->create($location) ?>
	<fieldset>
		<legend><?= __('Edit Location'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('idCarWorkShop');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
