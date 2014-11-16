<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # %s?', $employee->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Employee'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="employee view large-10 medium-9 columns">
	<h2><?= h($employee->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($employee->name) ?></p>
			<h6 class="subheader"><?= __('LastName') ?></h6>
			<p><?= h($employee->lastName) ?></p>
			<h6 class="subheader"><?= __('Nss') ?></h6>
			<p><?= h($employee->nss) ?></p>
			<h6 class="subheader"><?= __('Address') ?></h6>
			<p><?= h($employee->address) ?></p>
			<h6 class="subheader"><?= __('Phone') ?></h6>
			<p><?= h($employee->phone) ?></p>
			<h6 class="subheader"><?= __('Cellphone') ?></h6>
			<p><?= h($employee->cellphone) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($employee->id) ?></p>
			<h6 class="subheader"><?= __('IdCity') ?></h6>
			<p><?= $this->Number->format($employee->idCity) ?></p>
			<h6 class="subheader"><?= __('IdUser') ?></h6>
			<p><?= $this->Number->format($employee->idUser) ?></p>
			<h6 class="subheader"><?= __('IdCarWorkShop') ?></h6>
			<p><?= $this->Number->format($employee->idCarWorkShop) ?></p>
		</div>
	</div>
</div>
