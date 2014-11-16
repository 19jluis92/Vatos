<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # %s?', $client->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Client'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="client view large-10 medium-9 columns">
	<h2><?= h($client->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($client->Name) ?></p>
			<h6 class="subheader"><?= __('LastName') ?></h6>
			<p><?= h($client->LastName) ?></p>
			<h6 class="subheader"><?= __('RFC') ?></h6>
			<p><?= h($client->RFC) ?></p>
			<h6 class="subheader"><?= __('Clientcol') ?></h6>
			<p><?= h($client->Clientcol) ?></p>
			<h6 class="subheader"><?= __('Clientcol1') ?></h6>
			<p><?= h($client->Clientcol1) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($client->id) ?></p>
		</div>
	</div>
</div>
