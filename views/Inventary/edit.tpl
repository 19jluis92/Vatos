{extends file="../_Layouts/master.tpl"}
{block name=title}Inventario{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
  <div class="col-sm-4">
    <h2>Cliente</h2>
    <div class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$client[0][0]['Name']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Apellido</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$client[0][0]['LastName']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$client[0][0]['email']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">RFC</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$client[0][0]['RFC']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Dirección</label>
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
        <label class="col-sm-2 control-label">VIN</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$vehicle->vin}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Año</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$vehicle->year}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Caracteristicas</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$vehicle->characteristics}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Placas</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$vehicle->plates}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <h2>Servicio</h2>
      <div class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-sm-2 control-label">Comienzo</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$service->startDate}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Fin</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$service->endDate}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Atendió</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$service->idEmployee}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tienda</label>
        <div class="col-sm-10">
          <p class="form-control-static">{$service->idCarWorkShop}</p>
        </div>
      </div>
    </div>
  </div>    
</div>
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
<div>
  <label class="input-group-addon" for="id">Id Servicio</label>
  <select   name="idserviceForm" required="required" id="idserviceForm" class="form-control">
    <option value=''>-- none --</option>

  </select>
</div>

</br>

<div CLASS="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div CLASS="panel panel-default">
    <div CLASS="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Servicio
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
       <div id='serviceForm'>

       </div> 
     </div>
   </div>
 </div>
 <div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingTwo">
    <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       inspeccion
     </a>
   </h4>
 </div>
 <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
  <div class="panel-body">
    <div id='inspectionForm'>

    </div>
  </div>
</div>
</div>
<div CLASS="panel panel-default">
  <div CLASS="panel-heading" role="tab" id="headingThree">
    <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        ubicacion
      </a>
    </h4>
  </div>
  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
    <div class="panel-body">
      <div id="relocationForm">

      </div>
    </div>
  </div>
</div>
</div>

{/block}
{/block}
{block name=scripts}
{literal}

<script src="webroot/js/inventaryEditAjax.js"></script>
{/literal}
{/block}