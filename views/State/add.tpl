{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=State">Mostrar Estados</a></li>
		</ul>
	</div>
	<div class="brand col-md-10">
		<form method="post" accept-charset="utf-8" action="index.php?controller=State&view=create">
			<fieldset>
				<legend>Agregar Estado</legend>

				<div class="form-group input-group">
	  				<label for="id" class="input-group-addon">Id Estado</label>
					<input class="form-control" type="number" name="id" required="required" id="id" placeholder="Id Estado">
				</div>

				<div class="form-group input-group">
	  				<label for="name" class="input-group-addon">Nombre</label>
	  				<input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
				</div>

				<div class="form-group input-group">
	  				<label for="idState" class="input-group-addon">Id Pais</label>
					<input class="form-control" type="number" name="idState" required="required" id="idState" placeholder="Id Pais">
				</div>


			</fieldset>
			<button class="pull-right" type="submit">Submit</button>
		</form>
	</div>
</div>
				{/block}