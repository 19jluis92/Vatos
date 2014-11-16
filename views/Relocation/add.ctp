<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Relocation'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="relocation form large-10 medium-9 columns">
<?= $this->Form->create($relocation) ?>
	<fieldset>
		<legend><?= __('Add Relocation'); ?></legend>
	<?php
		echo $this->Form->input('relocationDate');
		echo $this->Form->input('idEmployee');
		echo $this->Form->input('reason');
		echo $this->Form->input('idDepartment');
		echo $this->Form->input('idService');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
