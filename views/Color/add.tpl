{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Color{/block}
{block name=pageheader}Color{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=Color">Listar Colores</a></li>
      </ul>
   </div>
	<div class="color form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Color&view=create">
			<fieldset>
			<legend>Agregar Color</legend>
				<div class="form-group input-group">
	  				<label for="name" class="input-group-addon">Nombre</label>
	  				<input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
				</div>
			</fieldset>
			<button class="pull-right" type="submit">Enviar</button>
		</form>
	</div>
</div>
{/block}