<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Cartype'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="cartype form large-10 medium-9 columns">
<?= $this->Form->create($cartype) ?>
	<fieldset>
		<legend><?= __('Add Cartype'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
