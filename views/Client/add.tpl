{extends file="../_Layouts/master.tpl"}
{block name=title}Clientes{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=client">Mostrar clientes</a>
			</li>
		</ul>
	</div>
	<div class="brand col-md-10">
		<form method="post" accept-charset="utf-8" action="index.php?controller=client&view=create">
			<fieldset>
				<legend>Agregar Cliente</legend>
					<div class="row">
	               <div class="col-md-6">
	                	<label for="name" class="input-group-addon">Nombre*</label>
							<input type="text" name="name" required="required" id="name" class="form-control" maxlength="45" placeholder="Nombre">
	               </div>
	               <div class="col-md-6">
							<label for="lastName" class="input-group-addon">Apellidos*</label>
							<input type="text" name="lastName" required="required" id="lastName" class="form-control" maxlength="45" placeholder="Apellidos">
	               </div>  
              	</div>
               <br />
               <div class="row">
	              <div class="col-md-6">
							<label for="rfc" class="input-group-addon">RFC*</label>
							<input type="text" name="rfc" required="required" id="rfc" class="form-control" maxlength="45" placeholder="RFC">
	               </div>
	               <div class="col-md-6">
	                	<label for="email" class="input-group-addon">Correo Electronico*</label>
							<input type="text" name="email" required="required" id="email" class="form-control" maxlength="45" placeholder="Email">
	               </div>
	            </div>
              <br />
				<div class="row">

	               <div class="col-md-12">
	               	<label for="address" class="input-group-addon">Password*</label>
					<input type="password" name="password" required="password" id="password" class="form-control" maxlength="45" placeholder="password">
	               </div>
	            </div>
	           <br />
               <div class="row">

	               <div class="col-md-12">
	               	<label for="address" class="input-group-addon">Direccion*</label>
							<input type="text" name="address" required="required" id="address" class="form-control" maxlength="45" placeholder="Direccion">
	               </div>
	            </div>
              <br />
				</fieldset>
				<button class="pull-right" type="submit">Guardar</button></form></div>
				{/block}