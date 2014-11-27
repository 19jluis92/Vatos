{extends file="../_Layouts/master.tpl"}
{block name=title}Departamento{/block}
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
				<a  class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Eliminar
				</a>
			</li>
			<li><a class="list-group-item" href="index.php?controller=department">Mostrar Departamentos</a></li>
		</ul>
	</div>
	<div class="department form large-10 medium-9 columns">
		<form role="form" method="post" accept-charset="utf-8" action="index.php?controller=department&view=edit&id={$department->id}">
		<input type="hidden" name="_method" value="PUT"></div>	
			<fieldset>
				<legend>Editar departmento</legend>
				<div class="row">
					<div class="col-md-8">
						<label for="name" class="input-group-addon">Nombre*</label><input type="text" name="name" required="required" maxlength="45" class="form-control" id="name" value="{$department->name}">
					</div>
					<div class="col-md-4">
						<label for ="idLocation" 	class="input-group-addon">Locacion*</label>
            <select name="idLocation" required="required" class="form-control" id="idLocation" placeholder="Lugar">
                   <option value=''>-- none --</option>
                  {html_options selected=$department->idLocation options=$locations}
            </select>
					</div>
				</div>					
				<br />
			</fieldset>
		<button type="submit" class="btn btn-default pull-right">Enviar</button>
	</form>
	</div>
	</div>
</div>
</div>

{/block}