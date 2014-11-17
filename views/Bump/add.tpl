{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions  col-md-2">
		<h3>Acciones
		</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=Bump">Ver Golpes
			</a>
		</li>
	</ul>
</div>
<div class="bump col-md-10">
	<form role="form" class="form-horizontal" method="post" accept-charset="utf-8" action="index.php?controller=Bump&view=create">
		<fieldset>
			<legend>Agregar Golpe
			</legend>
			<div class="form-group input-group">
				<label class="input-group-addon" for="idpiece">Pieza
				</label>
				<select name="idPiece" required="required" id="idpiece" class="form-control">
					    <option value=''>-- none --</option>
    					{html_options options=$pieces}
				</select>
			</div>
			<div class="form-group input-group">
			<label for="idseverity" class="input-group-addon">Severidad
			</label>
			<select name="idSeverity" required="required" id="idseverity" class="form-control">
			<option value=''>-- none --</option>
				{html_options options=$severities}
			</select>
		</div>
		<div class="form-group input-group">
			<label for="idinspection" class="input-group-addon">Inspección
			</label>
			<select name="idInspection" required="required" id="idinspection" class="form-control">
			<option value=''>-- none --</option>
				{html_options options=$inspections}
			</select>
		</div>
	</fieldset>
	<button class="btn btn-default" type="submit">Guardar</button>
</form>
</div>
{/block}