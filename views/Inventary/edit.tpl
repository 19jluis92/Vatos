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
