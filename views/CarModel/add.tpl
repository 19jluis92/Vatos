{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=CarModel">Listar Modelos</a></li>
		</ul>
	</div>
	<div class="carmodel col-md-10">
		<form method="post" accept-charset="utf-8" action="index.php?controller=CarModel&view=create">
			<fieldset>
				<legend>Agregar Modelo</legend>
				<div class="form-group input-group">
	  				<label for="name" class="input-group-addon">Nombre*</label>
	  				<input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
				</div>
				<div class="input number required">
				<label for="idbrand"> Brand*</label>
					<select  name="idBrand" required="required" id="idbrand">
					    <option value=''>-- none --</option>
    					{html_options options=$brands}
				</select>
				</div>
			</fieldset>
			<button class="pull-right" type="submit">Submit</button>
		</form>
	</div>
</div>
{/block}