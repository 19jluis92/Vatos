﻿{extends file="../_Layouts/master.tpl"}
{block name=title}Inventario{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
  <div class="col-sm-4">
    <h2>Cliente</h2>
    <div class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nombre*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$client[0][0]['Name']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Apellido*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$client[0][0]['LastName']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Email*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$client[0][0]['email']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">RFC*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$client[0][0]['RFC']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Dirección*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$client[0][0]['address']}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <h2>Vehiculo</h2>
    <div class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-sm-2 control-label">VIN*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$vehicle->vin}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Año*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$vehicle->year}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Caracteristicas*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$vehicle->characteristics}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Placas*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$vehicle->plates}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <h2>Servicio</h2>
    <input type="hidden" value="{$service->id}" id="service-id" > 
    <div class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-sm-2 control-label">Comienzo*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$service->startDate|date_format:"%d/%m/%Y %H:%M:%S"}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Fin*</label>
        <div class="col-sm-10">
        {if strtotime($service->endDate) }
          <p class="form-control-static">{$service->endDate|date_format:"%d/%m/%Y %H:%M:%S"}</p>
          {else}
          <input type="button" id="btn-out-service" value="salida" class="btn btn-default">
        {/if}
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Atendió*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$service->idEmployee}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tienda*</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$service->idCarWorkShop}</p>
        </div>
      </div>
    </div>
  </div>    
</div>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
 <div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingTwo">
    <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse"  href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       Inspecciones
     </a>
     {if !strtotime($service->endDate) }
     <a data-toggle="modal" data-target="#create-inspection" class="pull-right" id="new-inspection" href="#">Nuevo</a>
     {/if}
   </h4>
 </div>
 <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
  <div class="panel-body">
    <div id='inspectionForm'>
     <table class="table" id="tbl-inspections" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th><a href="index.php?controller=inspecion?sort=id&amp;direction=asc">Id</a></th>
          <th><a href="index.php?controller=inspecion?sort=startDate&amp;direction=asc">Kilometraje</a></th>
          <th><a href="index.php?controller=inspecion?sort=endDate&amp;direction=asc">Gasolina</a></th>
          <th><a href="index.php?controller=inspecion?sort=idCarWorkShop&amp;direction=asc">Fecha de Inspección</a></th>
          <th><a href="index.php?controller=inspecion?sort=idVehicle&amp;direction=asc">Tipo</a></th>
          <th class="actions">Acciones</th>
        </tr>
      </thead>
      <tbody>
        {foreach item=inspecion from=$inspections}

        <tr>
          <td>{$inspecion.id}</td>
          <td>{$inspecion.mileage}</td>
          <td>{$inspecion.fuel}</td>
          <td>{$inspecion.inspectionDate|date_format:"%d/%m/%Y %H:%M:%S"}</td>
          <td>{$inspecion.type}</td>
          <td class="actions">
{if !strtotime($service->endDate) }            
            <a class="edit" href="#{$inspecion.id}">Edit</a>    
{/if}
          </td>
        </tr>
        {/foreach}
      </tbody>

    </table>
  </div>
</div>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingThree">
    <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Reubicaciones
      </a>
      {if !strtotime($service->endDate) }
      <a class="pull-right" data-toggle="modal" data-target="#create-relocation" id="new-relocation" href="#">Nuevo</a>       
       {/if}
    </h4>
  </div>
  <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
    <div class="panel-body">
      <div id="relocationForm">
       <table class="table" cellpadding="0" id="tbl-relocations" cellspacing="0">
        <thead>
          <tr>
            <th><a href="index.php?controller=relocation?sort=id&amp;direction=asc">Fecha</a></th>
            <th><a href="index.php?controller=relocation?sort=startDate&amp;direction=asc">Razón</a></th>
            <th><a href="index.php?controller=relocation?sort=endDate&amp;direction=asc">Departamento de Destino</a></th>
            <th><a href="index.php?controller=relocation?sort=idCarWorkShop&amp;direction=asc">Empleado</a></th>
            <th class="actions">Acciones</th>
          </tr>
        </thead>
        <tbody>
          {foreach item=relocation from=$relocations}

          <tr>
            <td>{$relocation.relocationDate|date_format:"%d/%m/%Y %H:%M:%S"}</td>
            <td>{$relocation.reason}</td>
            <td>{$relocation.idDepartment}</td>
            <td>{$relocation.idEmployee}</td>
            <td class="actions">
            {if !strtotime($service->endDate) }
              <a class="edit" href="#{$relocation.id}">Edit</a>    
              {/if}
            </td>
          </tr>
          {/foreach}
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>

<div class="modal fade" id="create-inspection" tabindex="-1" role="dialog" aria-labelledby="create-inspection-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Inspección</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" id="inventory-form" accept-charset="utf-8" action="index.php?controller=inspection&view=create">
          <fieldset>
            <input type="hidden" name="idService" id="idService" value="{$service->id}">
            <div class="row">
              <div class="form-group input-group">
                <label for="mileage" class="input-group-addon">Kilometraje *</label>
                <input type="number" class="form-control" name="mileage" required="required" id="mileage">
              </div>
              <div class="form-group input-group">
                <label for="fuel" class="input-group-addon">Gasolina *</label>
                <input class="form-control" type="number" name="fuel" required="required" step="0.01" id="fuel">
              </div>  
              <div class="form-group input-group">
                <label class="input-group-addon" for="inspectionDate">Fecha de Inpección *</label>
                <input class="form-control date-time" type="text" name="inspectionDate" required="required" id="inspectionDate">
              </div>
              <div class="form-group input-group">
                <label class="input-group-addon" for="type">Tipo</label>
                <select class="form-control" id="type" name="type">
                  <option value="0">Entrada</option>
                  <option value="1">Salida</option>
                </select>
                <!--<input class="form-control" type="checkbox" id="type" name="type">-->
              </div>  
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-save-inspection" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="create-relocation" tabindex="-1" role="dialog" aria-labelledby="create-relocation-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Reubicación</h4>
      </div>
      <div class="modal-body">

        <form role="form" method="post" id="relocation-form" accept-charset="utf-8" action="index.php?controller=relocation&view=create">
          <fieldset>
            <input type="hidden" name="idService" id="idService" value="{$service->id}">
            <div class="row">
              <div class="form-group input-group">
                <label for="relocationDate" class="input-group-addon">Fecha *</label>
                <input type="text" name="relocationDate" required="required" class="date-time form-control" id="relocationDate">
              </div>
              <div class="form-group input-group">
                <label for ="idDepartment" class="input-group-addon">Departamento *</label>
                <select name="idDepartment" required="required" class="form-control" id="idDepartment" placeholder="idDepartment">
                 <option value=''>-- none --</option>
                 {html_options options=$departments}
               </select>
             </div>
             <div class="form-group input-group">
              <label for="reason" class="input-group-addon">Razón *</label>
              <textarea name="reason" required="required" class="form-control" id="reason" maxlength="200"></textarea>
            </div>  
          </div>
        </fieldset>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <button type="button" id="btn-save-relocation" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="edit-relocation" tabindex="-1" role="dialog" aria-labelledby="edit-relocation-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="edit-relocation-label">Editar Reubicación</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-edit-relocation" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit-inspection" tabindex="-1" role="dialog" aria-labelledby="edit-inspection-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="edit-inspection-label">Editar Inspección</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-edit-inspection" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
{/block}
{/block}
{block name=scripts}
{literal}
<script src="webroot/js/vendor/jquery.validate.1.13.1.min.js"></script>
<script src="webroot/js/vendor/jquery-validate.bootstrap-tooltip.js"></script>
<script  src="webroot/js/inventory.js" ></script>
<script>
  $('input.date-time').datetimepicker({
   useSeconds : true,
          format: 'DD/MM/YYYY HH:mm:ss',
              use24hours: true,        
          language: "es"
           });

  function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
      indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
  }
  (function(){
    var Inventory = {
      actualInspection:null,
      actualRelocation:null,
      init : function(){
        this.bind();
      },
      bind : function(){
        $("#btn-save-inspection").on("click",this.saveInspection);
        $("#btn-edit-inspection").on("click",this.saveEditInspection);
        $("#btn-save-relocation").on("click",this.saveRelocation);
        $("#btn-edit-relocation").on("click",this.saveEditRelocation);
        $("#tbl-inspections").on("click",".edit",this.editInspection);
        $("#tbl-relocations").on("click",".edit",this.editRelocation);
        $("#btn-out-service").on("click",this.closeService);
      },
      closeService : function(){
        $.ajax({
            type: 'POST',
            url: "?controller=service&view=closeService",
            data: {id: $("#service-id").val()},
            success: function (result) {
              if(JSON.parse(result) != null)
              {
                window.location.reload();  
              }
              else{
                alert("error");
              }
            },
            error : function (argument) {
              alert("error :" + argument);
            }
          });
        
      },
      saveEditRelocation : function (e) {
        e.preventDefault();
        var $form = $(this).parents(".modal").find("form");
        if($form.valid()){
          var data = getFormData($form);
          console.log(data);
          $.ajax({
            type: 'POST',
            url: "?controller=inventory&view=editRelocation",
            data: data,
            success: function (result) {
              if(JSON.parse(result) != true)
              {
              $("#edit-relocation").modal('hide');
              Inventory.actualRelocation.replaceWith(Inventory.getRelocationRow(JSON.parse(result)));
              Inventory.actualRelocation = null;  
              }
              else{
                alert("error");
              }
            },
            error : function (argument) {
              alert("error :" + argument);
            }
          });
        }
        return false;
      },
      saveEditInspection : function(e){
        e.preventDefault();
        $anchor = $(this);
        var $form = $(this).parents(".modal").find("form");
        if($form.valid()){
          var data = getFormData($form);
          console.log(data);
          $.ajax({
            type: 'POST',
            url: "?controller=inventory&view=editInspection",
            data: data,
            success: function (result) {
              if(JSON.parse(result) == true)
              {
              $("#edit-inspection").modal('hide');
              Inventory.actualInspection.replaceWith(Inventory.getRow(data));
              Inventory.actualInspection = null;
              }
              else{
                alert("error");
              }
            }
          });
        }
        return false;
      },
      editInspection : function(e){
        e.preventDefault();
        $("#edit-inspection").modal('show');
        Inventory.actualInspection = $(this).parents("tr");
        $.ajax({
          type: 'GET',
          url: "?controller=inventory&view=editInspection",
          data: {id: $(this).attr("href").substr(1)},
          success: function (result) {
            $("#edit-inspection .modal-body").html(result);
          },
          error:function() {
            alert("ocurrió un error al mostrar la inspección");
            Inventory.actualInspection = null;
          }
        });
        
        return false;
      },
       editRelocation : function(e){
        e.preventDefault();
        $("#edit-relocation").modal('show');
        Inventory.actualRelocation = $(this).parents("tr");
        $.ajax({
          type: 'GET',
          url: "?controller=inventory&view=editRelocation",
          data: {id: $(this).attr("href").substr(1)},
          success: function (result) {
            $("#edit-relocation .modal-body").html(result);
          },
          error:function() {
            alert("ocurrió un error al mostrar la reubicación");
            Inventory.actualRelocation = null;
          }
        });
        
        return false;
      },
      saveRelocation: function  (e) {
        e.preventDefault();
        if($("#relocation-form").valid()){
          console.log(getFormData($('#relocation-form')));
          $.ajax({
            url: "index.php?controller=relocation&view=createAjax",
            type: 'POST',
            data :  getFormData($('#relocation-form')) ,
            success : function(result){
              var res =JSON.parse(result); 
              console.log(res);
              if(res == null){

              }
              else{
               $("#tbl-relocations tbody").append(Inventory.getRelocationRow(res));
               $('#create-relocation').modal('hide');

             }
           },
           error : function(result, errorCode, errorText){
            alert("error al crear la inspección");
          }
        });
        }
      },
      saveInspection : function(e){
        e.preventDefault();
        if($("#inventory-form").valid()){
          console.log(getFormData($('#inventory-form')));
          $.ajax({
            url: "index.php?controller=inspection&view=createAjax",
            type: 'POST',
            data :  getFormData($('#inventory-form')) ,
            success : function(result){
              var res =JSON.parse(result); 
              console.log(res);
              if(res == null){

              }
              else{
               $("#tbl-inspections tbody").append(Inventory.getRow(res));
               $('#create-inspection').modal('hide')

             }
           },
           error : function(result, errorCode, errorText){
            alert("error al crear la inspección");
          }
        });
        }
      },getRow : function (result) {
        var template = '<tr> <td>{id}</td><td>{mileage}</td><td>{fuel}</td><td>{inspectionDate}</td><td>{type}</td><td class="actions"><a class="edit" href="#{id}">Edit</a></td></tr>';
        var resTemplate = template.replace('{id}',result.id);
        resTemplate = resTemplate.replace('{mileage}',result.mileage);
        resTemplate = resTemplate.replace('{fuel}',result.fuel);
        resTemplate = resTemplate.replace('{inspectionDate}',result.inspectionDate);
        resTemplate = resTemplate.replace('{type}',result.type);
        return resTemplate;
      },
      getRelocationRow:function(result){
        var template = '<tr><td>{$relocation.relocationDate}</td><td>{$relocation.reason}</td><td>{$relocation.idDepartment}</td><td>{$relocation.idEmployee}</td><td class="actions"><a href="#{$relocation.id}">Edit</a></td></tr>';
        var resTemplate = template.replace('{$relocation.id}',result.id);
        resTemplate = resTemplate.replace('{$relocation.reason}',result.reason);
        resTemplate = resTemplate.replace('{$relocation.idDepartment}',result.idDepartment);
        resTemplate = resTemplate.replace('{$relocation.idEmployee}',result.idEmployee);
        resTemplate = resTemplate.replace('{$relocation.relocationDate}',result.relocationDate);
        
        return resTemplate;
      }
    };
    Inventory.init();
    return false;

  })();
</script>
{/literal}
{/block}