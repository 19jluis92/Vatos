<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Workshopphone'), ['action' => 'edit', $workshopphone->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Workshopphone'), ['action' => 'delete', $workshopphone->id], ['confirm' => __('Are you sure you want to delete # %s?', $workshopphone->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Workshopphone'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Workshopphone'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="workshopphone view large-10 medium-9 columns">
	<h2><?= h($workshopphone->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Lada') ?></h6>
			<p><?= h($workshopphone->lada) ?></p>
			<h6 class="subheader"><?= __('Area') ?></h6>
			<p><?= h($workshopphone->area) ?></p>
			<h6 class="subheader"><?= __('Number') ?></h6>
			<p><?= h($workshopphone->number) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($workshopphone->id) ?></p>
			<h6 class="subheader"><?= __('IdCarWorkShop') ?></h6>
			<p><?= $this->Number->format($workshopphone->idCarWorkShop) ?></p>
		</div>
	</div>
</div>
