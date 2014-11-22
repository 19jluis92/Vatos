{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}

<div class="form-group input-group">
	<label class="input-group-addon">Cliente</label>
	<select id="idcliente"class="form-control">

    <option value=''>-- none --</option>  
    </select>
</div>	
<div class="form-group input-group">
	<label class="input-group-addon">Vehicle</label>
	<select id="idvehicle"class="form-control">
    <option value=''>-- none --</option> 
    </select>
</div>
</br>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" id="servicio">
  Servicio
</button>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" id="inspeccion">
  Inspeccion
</button>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" id="ubicacion">
 Ubicacion
</button>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Servicio</h4>
      </div>
      <div class="modal-body">
        <form method="post" accept-charset="utf-8" action="index.php?controller=Service&view=edit&id={$id}">
			<fieldset>
				<legend>Agregar Servicio</legend>

				<div class="row ">
                <div class="form-group input-group">
						<label for="startDate" class="input-group-addon">Fecha de inicio</label>
						<input type="date" required="required" name="startDate" class="form-control">
                </div>
                <div class="form-group input-group">
						<label for="endDate" class="input-group-addon">Fecha de fin</label>
						<input type="date" name="endDate" class="form-control"></select>
                </div>  
              </div>
            <br />

            <div class="row">
               <div class="form-group input-group">
						<label for="idcarworkshop" class="input-group-addon">Id Taller </label>
						<input type="number"  class="form-control" name="idCarWorkShop" required="required" id="idcarworkshop">
               </div>
               </br>
               	<div class="form-group input-group">
						<label for="idvehicle"class="input-group-addon">Id Vehiculo</label>
						<input type="number"  class="form-control" name="idVehicle" required="required" id="idvehicle">
                </div>
                </br>
                <div class="form-group input-group">
						<label for="idemployee" class="input-group-addon">Id Empleado</label>
						<input type="number"  class="form-control" name="idEmployee" required="required" id="idemployee">
					</div>
              </div>
            <br />
			</fieldset>
				
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="InspeccionModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Servicio</h4>
      </div>
      <div class="modal-body">
   <form method="post" accept-charset="utf-8" action="index.php?controller=Inspection&view=create">
			<fieldset>
				<legend>Inspeccion</legend>
				
				<div class="form-group input-group">
					<label for="mileage" class="input-group-addon">Millas</label>
					<input type="number" name="mileage" required="required" step="0.01" id="mileage" class="form-control"></div>
					<div class="form-group input-group">
						<label class="input-group-addon" for="fuel">Fuel</label>
						<input type="number" name="fuel" required="required" step="0.01" id="fuel" class="form-control"></div>
						<div class="form-group input-group"><label class="input-group-addon" for="inspectiondate">Inspection Date</label>
						<input class="form-control" type="date" name="inspectiondate" required="required" id="inspectiondate">
						</div>
						<div class="form-group input-group">
							<label   for="type" class="input-group-addon">Type</label><input type="checkbox" name="type" id="type" class="form-control"></div>
				</fieldset>
						
					
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="RehubicacionModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Servicio</h4>
      </div>
      <div class="modal-body">
 		<form method="post" accept-charset="utf-8" action="index.php?controller=Location&view=create">
			<fieldset>
				<legend> Lugar</legend>
				<div class="row">
              <div class="form-group input-group">
		  				<label for="id" class="input-group-addon">Id Lugar</label>
		  				<input type="number" name="id" required="required" class="form-control" maxlength="45" id="id" placeholder="Id Lugar">
               </div>
               <div class="form-group input-group">              
		  				<label for="name" class="input-group-addon">Nombre</label>
		  				<input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
               </div>  
            </div>
            <br />

            <div class="form-group input-group">
	  				<label for="idcarworkshop" class="input-group-addon">Id Taller</label>
	  				<input type="number" name="idcarworkshop" required="required" class="form-control" maxlength="45" id="idcarworkshop" placeholder="Id Taller Automotriz">
				</div>
			</fieldset>
			
	
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
       </form> 
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="error">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
   <p>
   	Por Favor Rellena los campos anteriores.
   </p> 
    </div>
  </div>
</div>
{/block}