{extends file="../_Layouts/master.tpl"}
{block name=title}Inventario{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
  <div class="col-md-12">

    <table class="table" cellpadding="0" cellspacing="0" id="inventory-table">
      <thead>
        <tr>
          <th></th>
          <th><a href="/vatoscake/client?sort=id&amp;direction=asc">Nombre</a></th>
          <th><a href="/vatoscake/client?sort=name&amp;direction=asc">RFC</a></th>
          <th><a href="/vatoscake/client?sort=name&amp;direction=asc">Dirección</a></th>
          <!-- <th class="actions">Acciones</th>-->
        </tr>
      </thead>
      <tbody>
        {foreach item=client from=$clients}
        <tr>
          <td><a data-id="{$client.id}" href="#" class="element-option"><i class="glyphicon glyphicon-unchecked" aria-hidden="true"></i></a></td>
          <td>{$client.Name}</td>
          <td>{$client.RFC}</td>
          <td>{$client.address}</td>
         <!-- <td class="actions">
            <div class="btn-group" role="group" aria-label="...">
              <a  class="btn btn-default" href="index.php?controller=CarWorkShop&view=details&id={$client.id}">Ver</a>       
              <a  class="btn btn-default" href="index.php?controller=CarWorkShop&view=edit&id={$client.id}">Editar</a>   
              <form action="index.php?controller=CarWorkShop&view=delete&id={$client.id}" name="post_carworkshop_{$client.id}" style="display:none;" method="post">
                <input type="hidden" name="_method" value="POST">
              </form>
              <a  class="btn btn-default" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_carworkshop_{$client.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
            </div>
          </td>-->
        </tr>
        {/foreach}
      </tbody>
    </table>
<!--<div class="form-group input-group">
  <label class="input-group-addon">Cliente</label>
  <select id="idcliente"class="form-control">

    <option value=''>-- none --</option>  
    </select>
  </div>  -->
  <form id="frm-inventory">
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
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">

            <legend>Agregar Servicio</legend>

            <div class="form-group input-group">
              <label for="startDate" class="input-group-addon">Fecha de entrada</label>
              <input type="text" disabled="disabled" required="required" name="startDate" class="date form-control bloqserv" id="startDate">
            </div>
            <div class="form-group input-group">
              <label for="endDate" class="input-group-addon">Fecha de salida</label>
              <input type="text"  disabled="disabled" name="endDate" class="date form-control bloqserv" id="endDate">
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

            <a href="#"class="btn btn-primary disabled" id="bto1">Siguiente</a>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse"  href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
            <div class="form-group input-group"><label class="input-group-addon" for="inspectiondate">Fecha de Chequeo</label>
              <input class="date form-control bloqIns"  disabled="disabled" type="text" name="inspectiondate" required="required" id="inspectiondate">
            </div>
            <div class="form-group input-group">
              <label   for="type" class="input-group-addon">Salida</label><input type="checkbox" disabled="disabled" name="type" id="type" class="bloqIns"></div>

              <a href="#"class="btn btn-primary"id="bto2">Guardar</a>


            </div>
          </div>
        </div>
        <!-- 
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse"  href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
               Ubicacion
             </a>
           </h4>
         </div>
  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
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
           
            <input type="hidden"  class="form-control bloqrelo" name="idEmployee" required="required" id="idEmployee" readonly>
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
    </div> -->
  </div>
</div>
</form>
</div>
</div>
{/block}
{block name=scripts}
{literal}
<script src="webroot/js/vendor/jquery.validate.1.13.1.min.js"></script>
<script src="webroot/js/vendor/jquery-validate.bootstrap-tooltip.js"></script>
<script  src="webroot/js/inventory.js" ></script>
<script>        $('input.date').datepicker();
</script>
{/literal}
{/block}