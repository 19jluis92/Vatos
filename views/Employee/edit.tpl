{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="container-fluid">
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li>
				<form action="index.php?controller=employee&view=delete&id={$user->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a href="#" class="list-group-item" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Eliminar
				</a>

			</li>
			<li><a class="list-group-item"  href="index.php?controller=employee">List Bump
			</a>
		</li>
		
	</ul>
	
</div>
<div class="brand col-md-10">
	<form method="post" class="form-horizontal" accept-charset="utf-8" action="index.php?controller=employee&view=edit&id={$user->id}">
		<fieldset>

			<legend>Edit employee</legend>
		<div class="input number required">
					<label for="id" class="input-group-addon">Id User</label>
					<input type="number" name="id" required="required" id="id" class="form-control" maxlength="45">
				</div>
				<div class="input number required">
					<label for="name" class="input-group-addon">Name</label>
					<input type="text" name="Name" required="required" id="Name" class="form-control" maxlength="45">
				</div>
				<div class="input number required">
					<label for="lastName" class="input-group-addon">Last Name</label>
					<input type="text" name="lastName" required="required" id="lastName" class="form-control" maxlength="45">
				</div>
				<div class="input number required">
					<label for="idCity" class="input-group-addon">Id City</label>
					<input type="number" name="idCity" required="required" id="idCity" class="form-control" maxlength="45">
				</div>
				<div class="input number required">
					<label for="address" class="input-group-addon">address</label>
					<input type="text" name="address" required="required" id="address" class="form-control" maxlength="45">
				</div>
				<div class="input number required">
					<label for="phone" class="input-group-addon">phone</label>
					<input type="phone" name="phone" required="required" id="phone" class="form-control" maxlength="45">
				</div>
				<div class="input number required">
					<label for="cellphone" class="input-group-addon">Cell phone</label>
					<input type="phone" name="cellphone" required="required" id="cellphone" class="form-control" maxlength="45">
				</div>
				<div class="input number required">
					<label for="idUser" class="input-group-addon">idUser</label>
					<input type="number" name="idUser" required="required" id="idUser" class="form-control" maxlength="45">
				</div>
				<div class="input number required">
					<label for="idCarWorkShop" class="input-group-addon">idCarWorkShop</label>
					<input type="number" name="idCarWorkShop" required="required" id="idCarWorkShop" class="form-control" maxlength="45">
				</div>	
	</fieldset>
	<button type="submit" class="btn btn-default" >Submit
	</button>
</form>
</div>

</div>
</div>

{/block}