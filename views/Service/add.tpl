{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=Service">Listar Servicios</a></li>
		</ul>
	</div>
	<div class="brand col-md-10">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Service&view=create">
			<fieldset>
				<legend>Agregar Servicio</legend>

				<div class="row">
                <div class="col-md-6">
						<label for="startDate" class="input-group-addon">Fecha de inicio</label>
						<input type="date" required="required" name="startDate" class="form-control">
                </div>
                <div class="col-md-6">
						<label for="endDate" class="input-group-addon">Fecha de fin</label>
						<input type="date" name="endDate" class="form-control"></select>
                </div>  
              </div>
            <br />

            <div class="row">
               <div class="col-md-4">
						<label for="idcarworkshop" class="input-group-addon">Id Taller </label>
						<input type="number"  class="form-control" name="idCarWorkShop" required="required" id="idcarworkshop">
               </div>
               	<div class="col-md-4">
						<label for="idvehicle"class="input-group-addon">Id Vehiculo</label>
						<input type="number"  class="form-control" name="idVehicle" required="required" id="idvehicle">
                </div>
                <div class="col-md-4">
						<label for="idemployee" class="input-group-addon">Id Empleado</label>
						<input type="number"  class="form-control" name="idEmployee" required="required" id="idemployee">
					</div>
              </div>
            <br />
			</fieldset>
				<button class="pull-right" type="submit">Submit</button>
			</form>
		</div>
	</div>
	{/block}