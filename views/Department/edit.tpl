{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="container-fluid">
	<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li>
				<form action="index.php?controller=department&view=delete&id={$department->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a  class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete
				</a>
			</li>
			<li><a class="list-group-item" href="index.php?controller=department">Mostrar Departamentos</a></li>
		</ul>
	</div>
	<div class="department form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=department&view=edit&id={$department->id}">
		<input type="hidden" name="_method" value="PUT"></div>	
			<fieldset>
				<legend>Edit department</legend>
				<div class="input text required"><label for="name" class="input-group-addon">Name</label><input type="text" name="name" required="required" maxlength="45" class="form-control" id="name" value="{$department->name}"></div>
				<div class="input number required"><label class="input-group-addon" for="idLocation">Id Location</label><input type="number" name="idLocation" required="required" id="idLocation" value="{$department->idLocation}"  maxlength="45" class="form-control"></div>
			</fieldset>
			<button class="btn btn-default" type="submit">Submit</button>
		</form>
	</div>
</div>
</div>

{/block}