<div class="bump form large-10 medium-9 columns">
	<form method="post" accept-charset="utf-8" action="index.php?controller=Relocation&view=edit&id={$user->id}">
		<fieldset>
			<legend>rehubicacion</legend>
			<div class="input number required">
					<label for="id">Id Relocation</label>
					<input type="number" name="id" required="required" id="id">
				</div>
				<div class="input number required">
					<label for="name">relocationDate</label>
					<input type="date" name="relocationDate" required="required" id="relocationDate">
				</div>
				<div class="input number required">
					<label for="idEmployee">idEmployee</label>
					<input type="number" name="idEmployee" required="required" id="idEmployee">
				</div>
				<div class="input number required">
					<label for="reason">reason</label>
					<input type="text" name="reason" required="required" id="reason">
				</div>
				<div class="input number required">
					<label for="idDepartment">idDepartment</label>
					<input type="number" name="idDepartment" required="required" id="idDepartment">
				</div>
				<div class="input number required">
					<label for="idService">idService</label>
					<input type="number" name="idService" required="required" id="idService">
				</div>
	</fieldset>
	<button type="submit">Submit
	</button>
</form>
</div>