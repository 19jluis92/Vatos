{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Brand">Mostrar Marcas</a></li>
		</ul>
	</div>
	<div class="brand form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Brand&view=create">
			<div style="display:none;"><input type="hidden" name="_method" value="POST">
			</div>
			<fieldset>
				<legend>Add Brand</legend>
				<div class="input text required input-group">
	  				<label for="name" class="input-group-addon">Nombre</label>
	  				<input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
				</div>
			<button class='pull-right' type="submit">
				Submit
			</button>
			</fieldset>
		</form>
	</div>
</div>
{/block}