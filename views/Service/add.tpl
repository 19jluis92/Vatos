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
                  <label for="idCarWorkShop" class="input-group-addon">Taller</label>
                  <select name="idCarWorkShop" required="required" id="idCarWorkShop" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$carWorkShops}
                 </select>
               </div>
               	<div class="col-md-4">
						<label for="idVehicle" class="input-group-addon">Vehiculo</label>
                  <select name="idVehicle" required="required" id="idVehicle" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$vehicles}
                 </select>
                </div>
                <div class="col-md-4">
						<label for="idEmployee" class="input-group-addon">Empleado</label>
                  <select name="idEmployee" required="required" id="idEmployee" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$employees}
                 </select>
					</div>
              </div>
            <br />
			</fieldset>
				<button class="pull-right" type="submit">Submit</button>
			</form>
		</div>
	</div>
	{/block}