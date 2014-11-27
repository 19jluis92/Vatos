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
				<form action="index.php?controller=Relocation&view=delete&id={$user->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Borrar
				</a>

			</li>
			<li><a href="index.php?controller=Relocation">Rehubicaciones
			</a>
		</li>
		
	</ul>
	
</div>
<div class="bump form large-10 medium-9 columns">
	<form method="post" accept-charset="utf-8" action="index.php?controller=Relocation&view=edit&id={$user->id}">
		<fieldset>
			<legend>Editar</legend>
			<div class="input number required">
					<label for="id">Id Relocacion</label>
					<input type="number" name="id" required="required" id="id">
				</div>
				<div class="input number required">
					<label for="name">Fecha*</label>
					<input type="date" name="relocationDate" required="required" id="relocationDate">
				</div>
				<div class="input number required">
					<label for="idEmployee">ID Empleado*</label>
					<input type="number" name="idEmployee" required="required" id="idEmployee">
				</div>
				<div class="input number required">
					<label for="reason">Rason*</label>
					<input type="text" name="reason" required="required" id="reason">
				</div>
				<div class="input number required">
					<label for="idDepartment">ID Departamento</label>
					<input type="number" name="idDepartment" required="required" id="idDepartment">
				</div>
				<div class="input number required">
					<label for="idService">ID servicio</label>
					<input type="number" name="idService" required="required" id="idService">
				</div>
	</fieldset>
	<button type="submit">Submit
	</button>
</form>
</div>

</div>
{/block}