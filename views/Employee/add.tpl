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
				<div class="input number required">
					<label for="id" class="input-group-addon">Id User</label>
					<input type="number" name="id" required="required" id="id" class="form-control" >
				</div>
				<div class="input number required">
					<label for="name" class="input-group-addon">Name</label>
					<input type="text" name="Name" required="required" id="Name" class="form-control" >
				</div>
				<div class="input number required">
					<label for="lastName" class="input-group-addon">Last Name</label>
					<input type="text" name="lastName" required="required" id="lastName" class="form-control" >
				</div>
				<div class="input number required">
					<label for="idCity" class="input-group-addon">Id City</label>
					<input type="number" name="idCity" required="required" id="idCity" class="form-control" >
				</div>
				<div class="input number required">
					<label for="address" class="input-group-addon">address</label>
					<input type="text" name="address" required="required" id="address" class="form-control" >
				</div>
				<div class="input number required">
					<label for="phone" class="input-group-addon">phone</label>
					<input type="phone" name="phone" required="required" id="phone" class="form-control" >
				</div>
				<div class="input number required">
					<label for="cellphone" class="input-group-addon">Cell phone</label>
					<input type="phone" name="cellphone" required="required" id="cellphone" class="form-control" >
				</div>
				<div class="input number required">
					<label for="idUser" class="input-group-addon">idUser</label>
					<input type="number" name="idUser" required="required" id="idUser" class="form-control" >
				</div>
				<div class="input number required">
					<label for="idCarWorkShop" class="input-group-addon">idCarWorkShop</label>
					<input type="number" name="idCarWorkShop" required="required" id="idCarWorkShop" class="form-control" >
				</div>
				</fieldset>
				<button type="submit">Submit</button></form></div>
				{/block}