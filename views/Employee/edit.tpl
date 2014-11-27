{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li>
				<form action="index.php?controller=employee&view=delete&id={$employee->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a href="#" class="list-group-item" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Eliminar
				</a>

			</li>
			<li><a class="list-group-item"  href="index.php?controller=employee">Listar Empleados
			</a>
		</li>
		
	</ul>
	
</div>
<div class="brand col-md-10">
	<form method="post" class="form-horizontal" accept-charset="utf-8" action="index.php?controller=employee&view=edit&id={$employee->id}">
		<fieldset>

			<legend>Editar Empleado</legend>
		
				<div class="input number required">
					<label for="name" class="input-group-addon">Nombre*</label>
					<input type="text" name="name" required="required" id="name" class="form-control" value="{$employee->name}" >
				</div>
				<div class="input number required">
					<label for="lastName" class="input-group-addon">Apellido*</label>
					<input type="text" name="lastName" required="required" id="lastName" class="form-control" value="{$employee->lastName}">
				<div class="input number required">
					<label for="NSS" class="input-group-addon">NSS*</label>
					<input type="text" name="nss" required="required" id="nss" class="form-control" value="{$employee->nss}">
				</div>
				</div>
				<div class="input number required">
					<label for="address" class="input-group-addon">direccion*</label>
					<input type="text" name="address" required="required" id="address" class="form-control" value="{$employee->address}" >
				</div>
				<div class="input number required">
					<label for="phone" class="input-group-addon">Telefono*</label>
					<input type="phone" name="phone" required="required" id="phone" class="form-control" value="{$employee->phone}">
				</div>
				<div class="input number required">
					<label for="cellphone" class="input-group-addon">Celular*</label>
					<input type="phone" name="cellPhone" required="required" id="cellPhone" class="form-control" value="{$employee->name}">
				</div>
				<div class="input number required">
					<label for="idCity" class="input-group-addon">Ciudad*</label>
					<select name="idCity" required="required" id="idCity" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$City}
                 </select>
				</div>
				<div class="input number required read-only">
					<label for="cellphone" class="input-group-addon">Usuario*</label>
					<input type="phone" name="cellPhone" required="required" id="cellPhone" class="form-control" value="{$employee->idUser}">
				</div>
				<div class="input number required">
					<label for="idCarWorkShop" class="input-group-addon">Tienda*</label>
					<select name="idCarWorkShop" required="required" id="idCarWorkShop" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$CarWorkShop}
                     </select>
				</div>
		</fieldset>
		<button type="submit" class="btn btn-default" >Enviar</button>
	</form>
</div>

</div>

{/block}