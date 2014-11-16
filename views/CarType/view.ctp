<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Cartype'), ['action' => 'edit', $cartype->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Cartype'), ['action' => 'delete', $cartype->id], ['confirm' => __('Are you sure you want to delete # %s?', $cartype->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Cartype'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Cartype'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="cartype view large-10 medium-9 columns">
	<h2><?= h($cartype->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($cartype->name) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($cartype->id) ?></p>
		</div>
	</div>
</div>
