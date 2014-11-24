{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a lass="list-group-item" href="index.php?controller=employee">Mostrar Empleados</a>
			</li>
		</ul>
	</div>
	<div class="brand col-md-10">
		<form method="post" accept-charset="utf-8" action="index.php?controller=employee&view=create" class="form-horizontal">
		
			<fieldset>
				<legend>Agregar Empleado</legend>
				<div class="row">
              <div class="col-md-6">
                 <label for="name" class="input-group-addon">Nombre</label>
					<input type="text" name="name" required="required" id="name" class="form-control" placeholder="Nombre" maxlength="15" >
              </div>

              <div class="col-md-3">
               	<label for="lastName" class="input-group-addon">Apellido</label>
					<input type="text" name="lastName" required="required" id="lastName" class="form-control" placeholder="Apellido" maxlength="15" >
	           </div>
	           <div class="col-md-3">
	               <label for="idCity" class="input-group-addon">Ciudad</label>
					<select name="idCity" required="required" id="idCity" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$City}
                 </select>
	            </div>
         	</div>
         	<br>

				<div class="row">
              <div class="col-md-6">
                 <label for="address" class="input-group-addon">Direccion</label>
					<input type="text" name="address" required="required" id="address" class="form-control" placeholder="Direccion" maxlength="25">
              </div>

              <div class="col-md-3">
               	<label for="nss" class="input-group-addon">NSS</label>
					<input type="text" name="nss" required="required" id="nss" class="form-control" placeholder="NSS" maxlength="25">
	           </div>
	           <div class="col-md-3">
	               <label for="phone" class="input-group-addon">Telefono</label>
					<input type="text" name="phone" required="required" id="phone" class="form-control" 
					placeholder="Telefono" maxlength="10">
	            </div>
         	</div>
				<br>

				<div class="row">
              <div class="col-md-6">
                 <label for="cellphone" class="input-group-addon">Celular</label>
					<input type="phone" name="cellPhone" required="required" id="cellPhone" class="form-control" placeholder="Celular" maxlength="10">
              </div>

              <div class="col-md-3">
               	<label for="idUser" class="input-group-addon">Usuario</label>
					<select name="idUser" required="required" id="idUser" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$Users}
                     </select>
	           </div>
	           <div class="col-md-3">
	               <label for="idCarWorkShop" class="input-group-addon">idCarWorkShop</label>
					<select name="idCarWorkShop" required="required" id="idCarWorkShop" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$CarWorkShop}
                     </select>
	            </div>
         	</div>
         	<br>

				</fieldset>
				<button class="btn btn-default pull-right" type="submit">Submit</button></form></div>
				{/block}