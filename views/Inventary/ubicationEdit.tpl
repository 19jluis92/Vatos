<div id="relocationChild" class="bump form large-10 medium-9 columns">
	<form method="post" accept-charset="utf-8" action="index.php?controller=inventory&view=ubicationEdit&id={$user->id}">
		<fieldset>
			<legend>rehubicacion</legend>
			<div class="input number required">
					
					
				</div>
				<div class="input number required">
					<label class="input-group-addon" for="name">Fecha de relocacion</label>
					<input class="form-control" type="date" name="relocationDate" required="required" id="relocationDate">
				</div>
				<div class="input number required">
					
					<input class="form-control"  type="hidden" name="idEmployee" required="required" id="idEmployee">
				</div>
				<div class="input number required">
					<label class="input-group-addon" for="reason">rason</label>
					<input class="form-control"  type="text" name="reason" required="required" id="reason">
				</div>
				<div class="form-group input-group">
					<label class="input-group-addon" >Departamento</label>
					<select required="required"  id="idDepartment"class="form-control bloqrelo">
						<option value=''>-- none --</option> </select>

					</div>
				<div class="input number required">
					
					<input class="form-control" type="hidden" name="idService" required="required" id="idService">
				</div>
	</fieldset>
	<button type="submit">Submit
	</button>
</form>
</div>