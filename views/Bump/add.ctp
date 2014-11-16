<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Bump'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="bump form large-10 medium-9 columns">
<?= $this->Form->create($bump) ?>
	<fieldset>
		<legend><?= __('Add Bump'); ?></legend>
	<?php
		echo $this->Form->input('idPiece');
		echo $this->Form->input('idSeverity');
		echo $this->Form->input('idInspection');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
