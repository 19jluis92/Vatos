<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Severity'), ['action' => 'edit', $severity->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Severity'), ['action' => 'delete', $severity->id], ['confirm' => __('Are you sure you want to delete # %s?', $severity->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Severity'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Severity'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="severity view large-10 medium-9 columns">
	<h2><?= h($severity->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($severity->name) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($severity->id) ?></p>
		</div>
	</div>
</div>
