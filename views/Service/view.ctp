<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # %s?', $service->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Service'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="service view large-10 medium-9 columns">
	<h2><?= h($service->id) ?></h2>
	<div class="row">
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($service->id) ?></p>
			<h6 class="subheader"><?= __('IdCarWorkShop') ?></h6>
			<p><?= $this->Number->format($service->idCarWorkShop) ?></p>
			<h6 class="subheader"><?= __('IdVehicle') ?></h6>
			<p><?= $this->Number->format($service->idVehicle) ?></p>
			<h6 class="subheader"><?= __('IdEmployee') ?></h6>
			<p><?= $this->Number->format($service->idEmployee) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('StartDate') ?></h6>
			<p><?= h($service->startDate) ?></p>
			<h6 class="subheader"><?= __('EndDate') ?></h6>
			<p><?= h($service->endDate) ?></p>
		</div>
	</div>
</div>
