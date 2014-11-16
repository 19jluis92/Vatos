<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Vehicle'), ['action' => 'edit', $vehicle->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Vehicle'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # %s?', $vehicle->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Vehicle'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vehicle'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="vehicle view large-10 medium-9 columns">
	<h2><?= h($vehicle->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Vin') ?></h6>
			<p><?= h($vehicle->vin) ?></p>
			<h6 class="subheader"><?= __('Characteristics') ?></h6>
			<p><?= h($vehicle->characteristics) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($vehicle->id) ?></p>
			<h6 class="subheader"><?= __('IdModel') ?></h6>
			<p><?= $this->Number->format($vehicle->idModel) ?></p>
			<h6 class="subheader"><?= __('IdColor') ?></h6>
			<p><?= $this->Number->format($vehicle->idColor) ?></p>
			<h6 class="subheader"><?= __('Year') ?></h6>
			<p><?= $this->Number->format($vehicle->year) ?></p>
			<h6 class="subheader"><?= __('IdCarType') ?></h6>
			<p><?= $this->Number->format($vehicle->idCarType) ?></p>
			<h6 class="subheader"><?= __('Plates') ?></h6>
			<p><?= $this->Number->format($vehicle->plates) ?></p>
		</div>
	</div>
</div>
