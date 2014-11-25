<div id="inspectionChild" class="inspection form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" class="form-horizontal"  action="index.php?controller=inventory&view=inspectionEdit&id={$inspection->id}">
			<fieldset>
				<legend>Add Inspection</legend>
				<div class="form-group input-group">
					<label  class="input-group-addon" for="idservice">Id Service</label><input type="number"  disabled name="idService" required="required" id="idService" value="{$inspection->idService}" class="form-control">
				</div>
				<div class="form-group input-group">
					<label  class="input-group-addon" for="mileage">Mileage</label>
					<input  class="form-control" type="number" name="mileage" required="required" step="0.01" id="mileage" value="{$inspection->mileage}"></div>
					<div class="form-group input-group">
						<label  class="input-group-addon" for="fuel">Fuel</label>
						<input class="form-control" type="number" name="fuel" required="required" step="0.01" id="fuel" value="{$inspection->fuel}"></div>
						<div class="form-group input-group"><label  class="input-group-addon" for="inspectiondate">Inspection Date</label>
							<input class="form-control" type="date" name="inspectiondate" required="required" id="inspectiondate" value="{$inspection->inspectionDate}">
						</div>
						<divclass="form-group input-group">
							<label  class="input-group-addon" for="type">Type</label><input class="form-control" type="checkbox" name="type" id="type" {if $inspection->type} checked="checked" {/if}></div>
						</fieldset>
						<button type="submit">Submit</button>
					</form>
				</div>