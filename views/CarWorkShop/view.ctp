<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Carworkshop'), ['action' => 'edit', $carworkshop->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Carworkshop'), ['action' => 'delete', $carworkshop->id], ['confirm' => __('Are you sure you want to delete # %s?', $carworkshop->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Carworkshop'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Carworkshop'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="carworkshop view large-10 medium-9 columns">
	<h2><?= h($carworkshop->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($carworkshop->name) ?></p>
			<h6 class="subheader"><?= __('Address') ?></h6>
			<p><?= h($carworkshop->address) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($carworkshop->id) ?></p>
			<h6 class="subheader"><?= __('IdCity') ?></h6>
			<p><?= $this->Number->format($carworkshop->idCity) ?></p>
		</div>
	</div>
</div>
