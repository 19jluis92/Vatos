{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item"  href="index.php?controller=Department">Mostrar Departamento</a></li>
		</ul>
	</div>
	<div class="brand col-md-10">
		<form  class="form-horizontal" method="post" accept-charset="utf-8" action="index.php?controller=Department&view=create">
		<div style="display:none;"><input type="hidden" name="_method" value="POST">
			</div>
			<fieldset>
			<legend>Add Department</legend>
				<div class="input text required">
					<label for="name" class="input-group-addon">Name</label>
					<input type="text" name="name" required="required" class="form-control" maxlength="45" id="name">
				</div>
				<div class="input number required"><label for="idlocation" class="input-group-addon">Id Location</label><input type="number" name="idLocation" required="required" id="idlocation" class="form-control" maxlength="45"></div>
			</fieldset>
			<button class="btn btn-default" type="submit">Submit</button>
		</form>
	</div>
</div>
{/block}