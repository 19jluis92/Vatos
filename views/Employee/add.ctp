<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Employee'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="employee form large-10 medium-9 columns">
<?= $this->Form->create($employee) ?>
	<fieldset>
		<legend><?= __('Add Employee'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('lastName');
		echo $this->Form->input('nss');
		echo $this->Form->input('idCity');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('cellphone');
		echo $this->Form->input('idUser');
		echo $this->Form->input('idCarWorkShop');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
