{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="container-fluid">
<div class="row">
	<div class="actions col-md-2">
		<h3>Actions</h3>
		<ul class="list-group">
			<li>
				<form action="index.php?controller=client&view=delete&id={$user->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a class="list-group-item"  href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete
				</a>

			</li>
			<li><a href="index.php?controller=client">Mostrar Clientes
			</a>
		</li>
		
	</ul>
	
</div>
<div class="brand col-md-10">
	<form class="form-horizontal" method="post" accept-charset="utf-8" action="index.php?controller=client&view=edit&id={$user->id}">
	<input type="hidden" name="_method" value="PUT">
		<fieldset>
			<legend>Edit Client</legend>
			<div class="input number required">
					<label for="id" class="input-group-addon">Id Client</label>
					<input type="number" name="id" required="required" id="id"  class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="name" class="input-group-addon">Name</label>
					<input type="text" name="name" required="required" id="name"  class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="lastName" class="input-group-addon">lastName</label>
					<input type="text" name="lastName" required="required" id="lastName"  class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="rfc" class="input-group-addon">rfc</label>
					<input type="text" name="rfc" required="required" id="rfc"  class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="clientCol" class="input-group-addon">Colonia</label>
					<input type="text" name="clientCol" required="required" id="clientCol"  class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="clientCol1" class="input-group-addon">Colonia</label>
					<input type="text" name="clientCol1" required="required" id="clientCol1"  class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="number" class="input-group-addon">Phone</label>
					<input type="phone" name="number" required="required" id="number"  class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="lada" class="input-group-addon" maxlength="45">lada</label>
					<input type="number" name="lada" required="required" id="lada"  class="form-control" maxlength="45">
					</div>
					<div class="input number required">
					<label for="area" class="input-group-addon">area</label>
					<input type="text" name="area" required="required" id="area"  class="form-control" maxlength="45">
					</div>	
	</fieldset>
	<button type="submit">Submit
	</button>
</form>
</div>

</div>
</div>

{/block}