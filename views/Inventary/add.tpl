{extends file="../_Layouts/master.tpl"}
{block name=title}Inventario{/block}
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


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Service
        </a>
      </h4>
    </div>
    <div id="collapseOne" CLASS="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      
              <legend>Agregar Servicio</legend>

              <div class="row ">
                <div class="form-group input-group">
                  <label for="startDate" class="input-group-addon">Fecha de inicio</label>
                  <input type="date" required="required" name="startDate" class="form-control bloqserv" id="startDate">
                </div>
                <div class="form-group input-group">
                  <label for="endDate" class="input-group-addon">Fecha de fin</label>
                  <input type="date" name="endDate" class="form-control bloqserv" id="endDate">
                </div>  
              </div>
              

              
               <div class="form-group input-group">
                <label for="idcarworkshop" class="input-group-addon"> Taller </label>

                <select id="idvehicleService" class="form-control bloqserv"  required="required">
                  <option value=''>-- none --</option> 
                </select>
               </div>
                
                <div class="form-group input-group">
                  <label for="idvehicle"class="input-group-addon">VIN  Vehiculo</label>
                  <input type="text"  class="form-control serviceIdVehicle bloqserv" name="idVehicle" required="required" id="idvehicle" data-id="0" readonly>
                </div>
              
                <div hidden class="form-group input-group">
                  <label for="idemployee" class="input-group-addon">Empleado</label>
                  <input type="number"  class="form-control bloqserv" name="idEmployee" required="required" id="idemployee" readonly>
                </div>

                <a href="#"class="btn btn-primary"id="bto1">Save changes</a>
      </div>
    </div>
  </div>
  <div CLASS="PANEL PANEL-default">
    <div CLASS="panel-heading" role="tab" id="headingTwo">
      <h4 CLASS="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         Inspeccion
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
      
         <legend>Inspeccion</legend>
        
        <div class="form-group input-group">
         <label for="idService" class="input-group-addon">ID servicio</label>
              <input type="number" class="form-control idservins" name="idService" required="required" step="0.01" id="idServiceInspection" readonly>
                  </div>
                  <div class="form-group input-group">
          <label for="mileage" class="input-group-addon">Millas</label>
          <input type="number" name="mileage" required="required" step="0.01" id="mileage" class="form-control bloqIns"></div>
          <div class="form-group input-group">
            <label class="input-group-addon" for="fuel">Fuel</label>
            <input type="number" name="fuel" required="required" step="0.01" id="fuel" class="form-control bloqIns"></div>
            <div class="form-group input-group"><label class="input-group-addon" for="inspectiondate">Inspection Date</label>
            <input class="form-control bloqIns" type="date" name="inspectiondate" required="required" id="inspectiondate">
            </div>
            <div class="form-group input-group">
              <label   for="type" class="input-group-addon">Type</label><input type="checkbox" name="type" id="type" class="form-control bloqIns"></div>
      
            <a href="#"class="btn btn-primary"id="bto2">Save changes</a>
          
    
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         Ubicacion
        </a>
      </h4>
    </div>
    <div id="collapseThree" CLASS="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
                <legend>Agregar Relocacion</legend>

        <div class="row">
          <div class="form-group input-group">
            
            <input type="hidden" name="id" required="required" class="form-control " id="id">
          </div>
          
        </div>
        <br />

        <div class="row">
                <div class="form-group input-group">
                  <label class="input-group-addon" for="idService">id Servicio</label>
            <input type="number" class="form-control idservins" name="idService" required="required" step="0.01" id="idServiceInspection" readonly>
                </div>
                <div class="form-group input-group">
            <label class="input-group-addon" for="name">Fecha de relocacion</label>
            <input type="date" class="form-control bloqrelo" name="relocationDate" required="required" id="relocationDate">
                </div>

                <div class="form-group input-group">
            <label class="input-group-addon" for="idEmployee"> Empleado</label>
            <input type="text" class="form-control bloqrelo" name="idEmployee" required="required" id="idEmployee" readonly>
                </div>

                <div class="form-group input-group">
                  <label class="input-group-addon" >Departamento</label>
                  <select required="required"  id="idDepartment"class="form-control bloqrelo">
            <option value=''>-- none --</option> </select>
            
                </div>
            </div>
            <br />

            <div class="form-group input-group">            
          <label for="reason" class="input-group-addon">Razon</label>
          <input type="textarea" name="reason" required="required" class="form-control bloqrelo" id="reason">
        </div>  
      <a  class="btn btn-primary" id="bto3">Save changes</a>

      </div>
    </div>
  </div>
</div>
{/block}
