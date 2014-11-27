{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Pais{/block}
{block name=pageheader}Pais{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=Country">Mostrar Paises</a></li>
      </ul>
  </div>
  <div class="col-md-10">	
		<form method="post" accept-charset="utf-8" action="index.php?controller=Country&view=create">
			<fieldset>
				<legend>Agregar Pais</legend>
				<div class="form-group input-group">
	  				<label for="name" class="input-group-addon">Nombre*</label>
	  				<input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
				</div>
			</fieldset>
			<button class="pull-right" type="submit">Submit</button>
		</form>
	</div>
</div>
{/block}