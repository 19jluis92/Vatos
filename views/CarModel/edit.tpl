{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li>
				<form action="index.php?controller=CarModel&view=delete&id={$carModel->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Eliminar
				</a>
			</li>
			<li><a href="index.php?controller=CarModel">Mostrar</a></li>
		</ul>
	</div>
	<div class="carModel form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=CarModel&view=edit&id={$carModel->id}">
			<fieldset>
				<legend>Editar </legend>
				<div class="input text required"><label for="name">Nombre*</label><input type="text" name="name" required="required" maxlength="45" id="name" value="{$carModel->name}"></div>
				<div class="input number required"><label for="idbrand">Marca*</label>
				<select  name="idBrand" required="required" id="idbrand">
					    <option value=''>-- none --</option>
    					{html_options options=$brands selected=$carModel->idBrand}
				</select>
				</div>
			</fieldset>
			<button type="submit">Submit</button>
		</form>
	</div>
</div>
{/block}