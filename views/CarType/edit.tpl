{extends file="../_Layouts/master.tpl"}
{block name=title}Tipo de Vehiculo{/block}
{block name=pageheader}Tipo de Vehiculo{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li>
				<form action="index.php?controller=CarType&view=delete&id={$carType->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a class="list-group-item"  href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete
				</a>
			</li>
			<li><a class="list-group-item"  href="index.php?controller=CarType">List CarType</a></li>
		</ul>
	</div>
	<div class="brand col-md-10">
		<form class="form-horizontal"  method="post" accept-charset="utf-8" action="index.php?controller=CarType&view=edit&id={$carType->id}">
			<fieldset>
				<legend>Editar Tipo de Carro</legend>
				<div class="input text required"><label class="input-group-addon"  for="name">Name</label><input class="form-control"  type="text" name="name" required="required" maxlength="45" id="name" value="{$carType->name}"></div>
			</fieldset>
			<button class="btn btn-default" type="submit">Submit</button>
		</form>
	</div>
</div>
{/block}