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
				<form action="index.php?controller=Piece&view=delete&id={$piece->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Eliminar
				</a>
			</li>
			<li><a class="list-group-item" href="index.php?controller=Piece">Mostrar Piezas</a></li>
		</ul>
	</div>
	<div class="brand col-md-10">
		<form class="form-horizontal" method="post" accept-charset="utf-8" action="index.php?controller=Piece&view=edit&id={$piece->id}">
		<div style="display:none;"><input type="hidden" name="_method" value="PUT"></div>
			<fieldset>
				<legend>Editar Piezas</legend>
				<div class="input text required"><label class="input-group-addon" for="name">Name</label><input type="text" name="name" required="required" maxlength="45" id="name" value="{$piece->name}"  class="form-control"></div>
			</fieldset>
			<button class="btn btn-default" type="submit">Submit</button>
		</form>
	</div>
</div>
</div>

{/block}