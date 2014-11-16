<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # %s?', $role->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Role'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="role view large-10 medium-9 columns">
	<h2><?= h($role->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($role->name) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($role->id) ?></p>
		</div>
	</div>
</div>
