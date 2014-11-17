{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=Piece">Mostrar Piezas</a></li>
		</ul>
	</div>
	<div class="brand col-md-10">
		<form method="post" class="form-horizontal" accept-charset="utf-8" action="index.php?controller=Piece&view=create">
		<div style="display:none;"><input type="hidden" name="_method" value="POST">
			</div>
			<fieldset>
			<legend>Agregar Piezas</legend>
				<div class="input text required">
					<label class="input-group-addon" for="name">Nombre</label>
					<input type="text" name="name" required="required" maxlength="45" id="name" class="form-control" >
				</div>
			</fieldset>
			<button  class="btn btn-default" type="submit">Submit</button>
		</form>
	</div>
</div>
{/block}