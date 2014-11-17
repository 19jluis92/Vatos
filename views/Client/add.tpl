{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=client">List Users</a>
			</li>
		</ul>
	</div>
	<div class="bump form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=client&view=create">
			<fieldset>
				<legend>Add User</legend>
				<div class="input number required">
					<label for="id">Id Client</label>
					<input type="number" name="id" required="required" id="id">
					</div>
					<div class="input number required">
					<label for="name">Name</label>
					<input type="text" name="name" required="required" id="name">
					</div>
					<div class="input number required">
					<label for="lastName">lastName</label>
					<input type="text" name="lastName" required="required" id="lastName">
					</div>
					<div class="input number required">
					<label for="rfc">rfc</label>
					<input type="text" name="rfc" required="required" id="rfc">
					</div>
					<div class="input number required">
					<label for="clientCol">Colonia</label>
					<input type="text" name="clientCol" required="required" id="clientCol">
					</div>
					<div class="input number required">
					<label for="clientCol1">Colonia</label>
					<input type="text" name="clientCol1" required="required" id="clientCol1">
					</div>
					<div class="input number required">
					<label for="number">Phone</label>
					<input type="phone" name="number" required="required" id="number">
					</div>
					<div class="input number required">
					<label for="lada">lada</label>
					<input type="number" name="lada" required="required" id="lada">
					</div>
					<div class="input number required">
					<label for="area">area</label>
					<input type="text" name="area" required="required" id="area">
					</div>
				</fieldset>
				<button type="submit">Submit</button></form></div>
				{/block}