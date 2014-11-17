{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Relocation">List Relocation</a>
			</li>
		</ul>
	</div>
	<div class="bump form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Relocation&view=create">
			<fieldset>
				<legend>Add Relocation</legend>
				<div class="input number required">
					<label for="id">Id Relocation</label>
					<input type="number" name="id" required="required" id="id">
				</div>
				<div class="input number required">
					<label for="name">relocationDate</label>
					<input type="date" name="relocationDate" required="required" id="relocationDate">
				</div>
				<div class="input number required">
					<label for="idEmployee">idEmployee</label>
					<input type="number" name="idEmployee" required="required" id="idEmployee">
				</div>
				<div class="input number required">
					<label for="reason">reason</label>
					<input type="text" name="reason" required="required" id="reason">
				</div>
				<div class="input number required">
					<label for="idDepartment">idDepartment</label>
					<input type="number" name="idDepartment" required="required" id="idDepartment">
				</div>
				<div class="input number required">
					<label for="idService">idService</label>
					<input type="number" name="idService" required="required" id="idService">
				</div>
				</fieldset>
				<button type="submit">Submit</button></form></div>
				{/block}