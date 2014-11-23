<div class="brand col-md-10">
		<form method="post" class="form-horizontal" accept-charset="utf-8" action="index.php?controller=Service&view=edit&id={$service->id}">

			<fieldset>
				<legend>Edit Service</legend>
				<div class="form-group input-group">
					<label class="input-group-addon" for="id">Id Servicio</label>
					<select   name="idserviceForm" required="required" id="idserviceForm" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$service->id selected=$service->id}
                    </select>
				</div>
				<div class="form-group input-group">
					<label class="input-group-addon" for="startDate">Start Date</label>
					<input type="date" required="required" name="startDate" value="{$service->startDate}" class="form-control"> 
				</div>
				<div class="form-group input-group">
					<label class="input-group-addon" for="endDate">Start Date</label>
					<input type="date" name="endDate" value="{$service->endDate}" class="form-control">
				</div>
				<div class="form-group input-group">
					<label class="input-group-addon" for="idcarworkshop">Id Car Work Shop</label>
					<select   name="idCarWorkShop" required="required" id="idCarWorkShop" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$CarWorkShop selected=$service->idCarWorkShop}
                    </select>
				</div>
				<div class="form-group input-group">
					<label class="input-group-addon" for="idvehicle">Id Vehicle</label>
					<select disabled name="idVehicleServicio" required="required" id="idVehicleService" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$Vehicle selected=$service->idVehicle}
                    </select>
				</div>
				<div class="form-group input-group">
				<label class="input-group-addon" for="idemployee">Id Employee</label>
				<input type="number" name="idEmployee" required="required" id="idemployee" value="{$service->idEmployee}" class="form-control" readonly>
				</div>
			</fieldset>
			<button type="submit">Submit</button>
		</form>
	</div>