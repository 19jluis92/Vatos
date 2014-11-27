{extends file="../_Layouts/master.tpl"}
{block name=title}Lugares{/block}
{block name=pageheader}Lugares{/block}
{block name=head}
{/block}
{block name=body}
	<div class="actions col-md-2">
		<h3>Actions</h3>
		<ul class="list-group">
			<li>
				<form action="index.php?controller=Location&view=delete&id={$location->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Borrar Lugar
				</a>
			</li>
			<li>
				<a class="list-group-item" href="index.php?controller=Location">Listar Lugares</a>
			</li>
		</ul>

	</div>
	<div class="bump col-md-10">
		<form method="post" accept-charset="utf-8" class="form form-horizontal" action="index.php?controller=Location&view=edit&id={$location->id}">
			<fieldset>
				<legend>Edit Location</legend>
				<div class="row">
					<div class="form-group input-group">
						<label for="name" class="input-group-addon">Nombre*</label>
						<input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre" value="{$location->name}">
					</div>
					<div class="form-group input-group">
						<label for ="idCarWorkShop" class="input-group-addon">Tienda*</label>
						<select name="idCarWorkShop" required="required" class="form-control" id="idCarWorkShop" placeholder="idCarWorkShop">
							<option value=''>-- none --</option>
							{html_options selected=$location->idCarWorkShop options=$carWorkShops}
						</select>
					</div>  
				</div>
			</fieldset>
			<button type="submit" class="btn btn-default pull-right">Enviar</button>
			</form>

	{/block}