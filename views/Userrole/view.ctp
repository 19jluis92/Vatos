<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Userrole'), ['action' => 'edit', $userrole->idUser]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Userrole'), ['action' => 'delete', $userrole->idUser], ['confirm' => __('Are you sure you want to delete # %s?', $userrole->idUser)]) ?> </li>
		<li><?= $this->Html->link(__('List Userrole'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Userrole'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="userrole view large-10 medium-9 columns">
	<h2><?= h($userrole->idUser) ?></h2>
	<div class="row">
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('IdUser') ?></h6>
			<p><?= $this->Number->format($userrole->idUser) ?></p>
			<h6 class="subheader"><?= __('IdRole') ?></h6>
			<p><?= $this->Number->format($userrole->idRole) ?></p>
		</div>
	</div>
</div>
