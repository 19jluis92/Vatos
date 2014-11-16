<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit State'), ['action' => 'edit', $state->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete State'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # %s?', $state->id)]) ?> </li>
		<li><?= $this->Html->link(__('List State'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New State'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="state view large-10 medium-9 columns">
	<h2><?= h($state->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($state->Name) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($state->id) ?></p>
			<h6 class="subheader"><?= __('IdCountry') ?></h6>
			<p><?= $this->Number->format($state->IdCountry) ?></p>
		</div>
	</div>
</div>
