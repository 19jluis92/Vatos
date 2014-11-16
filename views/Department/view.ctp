<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->id], ['confirm' => __('Are you sure you want to delete # %s?', $department->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Department'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="department view large-10 medium-9 columns">
	<h2><?= h($department->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($department->name) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($department->id) ?></p>
			<h6 class="subheader"><?= __('IdLocation') ?></h6>
			<p><?= $this->Number->format($department->idLocation) ?></p>
		</div>
	</div>
</div>
