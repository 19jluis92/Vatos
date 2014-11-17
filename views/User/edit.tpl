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
				<form action="index.php?controller=user&view=delete&id={$user->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a  class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Eliminar
				</a>

			</li>
			<li><a class="list-group-item" href="index.php?controller=user">Mostrar Usuarios
			</a>
		</li>
		
	</ul>
	
</div>
<div  class="brand col-md-10">
	<form method="post"  class="form-horizontal"  accept-charset="utf-8" action="index.php?controller=user&view=edit&id={$user->id}">
	<div style="display:none;"><input type="hidden" name="_method" value="PUT"></div>	
		<fieldset>
			<legend>Editar Usuario</legend>
			<label  class="input-group-addon" for="idpiece">Id user</label>
			<input type="number" name="id" required="required" id="id" value="{$user->id}" class="form-control">
		</div>
		</br>
		<div class="input number required">
			<label  class="input-group-addon" for="email">Email</label>
			<input type="text" name="email" required="required" id="email" value="{$user->email}"   class="form-control" style="width: 83%;">
		</div>
		</br>
		<div class="input number required">
			<label  class="input-group-addon" for="password">password</label>
			<input type="password" name="password" required="required" id="password" value="{$user->password}" class="form-control" style="width: 83%;">
		</div>	
	</fieldset>
	<button  class="btn btn-default" type="submit">Submit
	</button>
</form>
</div>

</div>
</div>

{/block}