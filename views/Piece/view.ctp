<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Piece'), ['action' => 'edit', $piece->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Piece'), ['action' => 'delete', $piece->id], ['confirm' => __('Are you sure you want to delete # %s?', $piece->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Piece'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Piece'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="piece view large-10 medium-9 columns">
	<h2><?= h($piece->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($piece->name) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($piece->id) ?></p>
		</div>
	</div>
</div>
