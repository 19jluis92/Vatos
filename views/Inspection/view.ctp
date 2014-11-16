<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Inspection'), ['action' => 'edit', $inspection->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Inspection'), ['action' => 'delete', $inspection->id], ['confirm' => __('Are you sure you want to delete # %s?', $inspection->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Inspection'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Inspection'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="inspection view large-10 medium-9 columns">
	<h2><?= h($inspection->id) ?></h2>
	<div class="row">
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($inspection->id) ?></p>
			<h6 class="subheader"><?= __('IdService') ?></h6>
			<p><?= $this->Number->format($inspection->idService) ?></p>
			<h6 class="subheader"><?= __('Mileage') ?></h6>
			<p><?= $this->Number->format($inspection->mileage) ?></p>
			<h6 class="subheader"><?= __('Fuel') ?></h6>
			<p><?= $this->Number->format($inspection->fuel) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('InspectionDate') ?></h6>
			<p><?= h($inspection->inspectionDate) ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Type') ?></h6>
			<?= $this->Text->autoParagraph(h($inspection->type)); ?>
		</div>
	</div>
</div>
