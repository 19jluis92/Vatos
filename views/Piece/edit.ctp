<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $piece->id], ['confirm' => __('Are you sure you want to delete # %s?', $piece->id)]) ?></li>
		<li><?= $this->Html->link(__('List Piece'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="piece form large-10 medium-9 columns">
<?= $this->Form->create($piece) ?>
	<fieldset>
		<legend><?= __('Edit Piece'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
