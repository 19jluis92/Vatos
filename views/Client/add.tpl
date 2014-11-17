{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
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
		<form method="post" accept-charset="utf-8" action="index.php?controller=client&view=create"  class="form-horizontal">
		<div style="display:none;"><input type="hidden" name="_method" value="POST">
			</div>
			<fieldset>
				<legend>Agregar Cliente</legend>
				<div class="input number required">
					<label for="id" class="input-group-addon">Id Client</label>
					<input type="number" name="id" required="required" id="id" class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="name" class="input-group-addon">Name</label>
					<input type="text" name="name" required="required" id="name" class="form-control" maxlength="45">
					</div>
					<div class="input number required" >
					<label for="lastName" class="input-group-addon">lastName</label>
					<input type="text" name="lastName" required="required" id="lastName" class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="rfc" class="input-group-addon">rfc</label>
					<input type="text" name="rfc" required="required" id="rfc" class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="clientCol" class="input-group-addon">Colonia</label>
					<input type="text" name="clientCol" required="required" id="clientCol" class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="clientCol1" class="input-group-addon">Colonia</label>
					<input type="text" name="clientCol1" required="required" id="clientCol1" class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="number" class="input-group-addon">Phone</label>
					<input type="phone" name="number" required="required" id="number" class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="lada" class="input-group-addon">lada</label>
					<input type="number" name="lada" required="required" id="lada" class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="area" class="input-group-addon">area</label>
					<input type="text" name="area" required="required" id="area" class="form-control" maxlength="45">
					</div>
				</fieldset>
				<button type="submit">Submit</button></form></div>
				{/block}