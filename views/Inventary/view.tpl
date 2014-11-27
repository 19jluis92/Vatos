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
        <label class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$client[0][0]['Name']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Apellido</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$client[0][0]['LastName']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$client[0][0]['email']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">RFC</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$client[0][0]['RFC']}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Dirección</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$client[0][0]['address']}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <h2>Vehiculo</h2>
    <div class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-sm-3 control-label">VIN</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$vehicle->vin}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Año</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$vehicle->year}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Caracteristicas</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$vehicle->characteristics}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Placas</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$vehicle->plates}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <h2>Servicio</h2>
    <div class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-sm-3 control-label">Comienzo</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$service->startDate}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Fin</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$service->endDate}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Atendió</label>
        <div class="col-sm-9">
          <p class="form-control-static">{$service->idEmployee}</p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Tienda</label>
        <div class="col-sm-9">
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
     
       Inspecciones
     
   </h4>
 </div>
 <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
  <div class="panel-body">
    <div id='inspectionForm'>
     <table class="table" id="tbl-inspections" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th>Id</th>
          <th>Kilometraje</th>
          <th>Gasolina</th>
          <th>FechaInspección</a></th>
          <th>Tipo</th>
          
        </tr>
      </thead>
      <tbody>
        {foreach item=inspecion from=$inspections}

        <tr>
          <td>{$inspecion.id}</td>
          <td>{$inspecion.mileage}</td>
          <td>{$inspecion.fuel}</td>
          <td>{$inspecion.inspectionDate}</td>
          <td>{$inspecion.type}</td>
          
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
        Reubicaciones
    </h4>
  </div>
  <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
    <div class="panel-body">
      <div id="relocationForm">
       <table class="table" cellpadding="0" id="tbl-relocations" cellspacing="0">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Razón</th>
            <th>Departamento de Destino</th>
            <th>Empleado</th>
          </tr>
        </thead>
        <tbody>
          {foreach item=relocation from=$relocations}

          <tr>
            <td>{$relocation.relocationDate}</td>
            <td>{$relocation.reason}</td>
            <td>{$relocation.idDepartment}</td>
            <td>{$relocation.idEmployee}</td>
          </tr>
          {/foreach}
        </tbody>
        </table>
    </div>
  </div>
</div>
</div>
</div>

{/block}
{/block}
{block name=scripts}
{literal}

{/literal}
{/block}