<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $model->id], ['confirm' => __('Are you sure you want to delete # %s?', $model->id)]) ?></li>
		<li><?= $this->Html->link(__('List Model'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="model form large-10 medium-9 columns">
<?= $this->Form->create($model) ?>
	<fieldset>
		<legend><?= __('Edit Model'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('idBrand');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
