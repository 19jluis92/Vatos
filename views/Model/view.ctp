<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Model'), ['action' => 'edit', $model->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Model'), ['action' => 'delete', $model->id], ['confirm' => __('Are you sure you want to delete # %s?', $model->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Model'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Model'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="model view large-10 medium-9 columns">
	<h2><?= h($model->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($model->name) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($model->id) ?></p>
			<h6 class="subheader"><?= __('IdBrand') ?></h6>
			<p><?= $this->Number->format($model->idBrand) ?></p>
		</div>
	</div>
</div>
