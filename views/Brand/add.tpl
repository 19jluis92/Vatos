{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Marca{/block}
{block name=pageheader}Marcas{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Actions</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=Brand">Mostrar Marcas</a></li>
		</ul>
	</div>
	<div class="brand col-md-10">
		<form role="form" class="form-horizontal" method="post" accept-charset="utf-8" action="index.php?controller=Brand&view=create">
			<div style="display:none;"><input type="hidden" name="_method" value="POST">
			</div>
			<fieldset>
				<legend>Agregar Marca</legend>
				<div class="form-group input-group">
	  				<label for="name" class="input-group-addon">Nombre</label>
	  				<input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
				</div>
			<button class="btn btn-default" type="submit">
				Guardar
			</button>
			</fieldset>
		</form>
	</div>
</div>
{/block}