<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userrole->idUser], ['confirm' => __('Are you sure you want to delete # %s?', $userrole->idUser)]) ?></li>
		<li><?= $this->Html->link(__('List Userrole'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="userrole form large-10 medium-9 columns">
<?= $this->Form->create($userrole) ?>
	<fieldset>
		<legend><?= __('Edit Userrole'); ?></legend>
	<?php
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
