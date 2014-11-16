<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Bump'), ['action' => 'edit', $bump->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Bump'), ['action' => 'delete', $bump->id], ['confirm' => __('Are you sure you want to delete # %s?', $bump->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Bump'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bump'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="bump view large-10 medium-9 columns">
	<h2><?= h($bump->id) ?></h2>
	<div class="row">
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($bump->id) ?></p>
			<h6 class="subheader"><?= __('IdPiece') ?></h6>
			<p><?= $this->Number->format($bump->idPiece) ?></p>
			<h6 class="subheader"><?= __('IdSeverity') ?></h6>
			<p><?= $this->Number->format($bump->idSeverity) ?></p>
			<h6 class="subheader"><?= __('IdInspection') ?></h6>
			<p><?= $this->Number->format($bump->idInspection) ?></p>
		</div>
	</div>
</div>
