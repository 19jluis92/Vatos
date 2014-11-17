{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Location">List Location</a>
			</li>
		</ul>
	</div>
	<div class="bump form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Location&view=create">
			<fieldset>
				<legend>Add Location</legend>
				<div class="input number required">
					<label for="id">Id Location</label>
					<input type="number" name="id" required="required" id="id">
				</div>
				<div class="input number required">
					<label for="name">Name</label>
					<input type="text" name="name" required="required" id="name">
				</div>
				<div class="input number required">
					<label for="idCarWorkShop">idCarWorkShop</label>
					<input type="number" name="idCarWorkShop" required="required" id="idCarWorkShop">
				</div>
				</fieldset>
				<button type="submit">Submit</button></form></div>
				{/block}