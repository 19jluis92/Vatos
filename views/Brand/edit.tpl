{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Marca{/block}
{block name=pageheader}Marcas{/block}
{block name=head}
{/block}
{block name=body}
<div class="container-fluid">
	<div class="row ">
		<div class="actions col-md-2">
			<h3>Actions</h3>
			<ul class="list-group">
			<li>
					<form action="index.php?controller=Brand&view=delete&id={$brand->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
						<input type="hidden" name="_method" value="POST">
					</form>
					<a class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete</a>
				</li>
				<li><a class="list-group-item" href="index.php?controller=Brand">List Brand</a></li>
			</ul>
		</div>
		<div class="brand col-md-10">
			<form role="form" class="form-horizontal" method="post" accept-charset="utf-8" action="index.php?controller=Brand&view=edit&id={$brand->id}"><div style="display:none;"><input type="hidden" name="_method" value="PUT"></div>	
			<fieldset>
				<legend>Editar Marca</legend>
				<div class="form-group input-group">
				<label class="input-group-addon" for="name">Nombre</label>
				<input type="text" name="name" required="required" maxlength="45" id="name" value="{$brand->name}" class="form-control">
				</div>
				</fieldset>
				<button class="btn btn-default" type="submit">Submit</button></form></div>
			</div>
		</div>
		{/block}