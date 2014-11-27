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
				<form action="index.php?controller=client&view=delete&id={$client->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Borrar Cliente
				</a>

			</li>
			<li><a class="list-group-item" href="index.php?controller=client">Mostrar Clientes
			</a>
		</li>
		
	</ul>
	
</div>
<div  class="client col-md-10">
			<form method="post"  class="form-horizontal"  accept-charset="utf-8" action="index.php?controller=client&view=edit&id={$client->id}">
				<div style="display:none;"><input type="hidden" name="_method" value="PUT"></div>	
				<fieldset>
					<legend>Editar cliente</legend>
					<div class="row">
	               <div class="col-md-6">
	                	<label for="name" class="input-group-addon">Nombre*</label>
							<input type="text" name="name" required="required" id="name" class="form-control" maxlength="45" placeholder="Nombre" value="{$client->name}">
	               </div>
	               <div class="col-md-6">
							<label for="lastName" class="input-group-addon">Apellidos*</label>
							<input type="text" name="lastName" required="required" id="lastName" class="form-control" maxlength="45" placeholder="Apellidos" value="{$client->lastName}">
	               </div>  
              	</div>
               <br />
               <div class="row">
	              <div class="col-md-6">
							<label for="rfc" class="input-group-addon">RFC*</label>
							<input type="text" name="rfc" required="required" id="rfc" class="form-control" maxlength="45" placeholder="RFC" value="{$client->rfc}">
	               </div>
	               <div class="col-md-6">
	                	<label for="email" class="input-group-addon">Correo Electronico*</label>
							<input type="text" name="email" required="required" id="email" class="form-control" maxlength="45" placeholder="Email" value="{$client->email}">
	               </div>
	            </div>
              <br />

               <div class="row">

	               <div class="col-md-12">
	               	<label for="address" class="input-group-addon">Direccion*</label>
							<input type="text" name="address" required="required" id="address" class="form-control" maxlength="45" placeholder="Direccion" value="{$client->address}">
	               </div>
	            </div>
					</br>
				</fieldset>
				<button class="btn btn-default pull-right" type="submit">Enviar</button>
			</form>
		</div>

</div>
</div>

{/block}