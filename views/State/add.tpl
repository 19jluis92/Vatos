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
		  				<label for="name" class="input-group-addon">Nombre*</label>
		  				<input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
					</div>

					<div class="form-group input-group">
		  				<label for="idCountry" class="input-group-addon">Pais*</label>
                  <select name="idCountry" required="required" id="idCountry" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$countries}
                 </select>
					</div>
			</fieldset>
			<button class="pull-right" type="submit">Submit</button>
		</form>
	</div>
</div>
				{/block}