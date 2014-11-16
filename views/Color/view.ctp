<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Color'), ['action' => 'edit', $color->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Color'), ['action' => 'delete', $color->id], ['confirm' => __('Are you sure you want to delete # %s?', $color->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Color'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Color'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="color view large-10 medium-9 columns">
	<h2><?= h($color->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($color->Name) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($color->id) ?></p>
		</div>
	</div>
</div>
