<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # %s?', $city->id)]) ?> </li>
		<li><?= $this->Html->link(__('List City'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="city view large-10 medium-9 columns">
	<h2><?= h($city->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($city->name) ?></p>
			<h6 class="subheader"><?= __('Citycol') ?></h6>
			<p><?= h($city->Citycol) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($city->id) ?></p>
			<h6 class="subheader"><?= __('IdState') ?></h6>
			<p><?= $this->Number->format($city->idState) ?></p>
		</div>
	</div>
</div>
