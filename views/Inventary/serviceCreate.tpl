<div id="serviceChild" class="brand col-md-10">
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
              
                <div  class="form-group input-group">
                  
                  <input type="hidden"  class="form-control bloqserv" name="idEmployee" required="required" id="idemployee" readonly>
                </div>

                <a href="#"class="btn btn-primary"id="bto1">Save changes</a>
</div>