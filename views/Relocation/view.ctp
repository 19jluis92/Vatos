<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Relocation'), ['action' => 'edit', $relocation->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Relocation'), ['action' => 'delete', $relocation->id], ['confirm' => __('Are you sure you want to delete # %s?', $relocation->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Relocation'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Relocation'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="relocation view large-10 medium-9 columns">
	<h2><?= h($relocation->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Reason') ?></h6>
			<p><?= h($relocation->reason) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($relocation->id) ?></p>
			<h6 class="subheader"><?= __('IdEmployee') ?></h6>
			<p><?= $this->Number->format($relocation->idEmployee) ?></p>
			<h6 class="subheader"><?= __('IdDepartment') ?></h6>
			<p><?= $this->Number->format($relocation->idDepartment) ?></p>
			<h6 class="subheader"><?= __('IdService') ?></h6>
			<p><?= $this->Number->format($relocation->idService) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('RelocationDate') ?></h6>
			<p><?= h($relocation->relocationDate) ?></p>
		</div>
	</div>
</div>
