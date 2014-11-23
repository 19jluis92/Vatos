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
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" id="servicio">
  Servicio
</button>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" id="inspectionEdit">
  Inspeccion
</button>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" id="ubicacionEdit">
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
      <div id='serviceForm'>
        
      </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-primary" id="bto1">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="InspeccionModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Inspeccion</h4>
      </div>
      <div class="modal-body">
      <div id='inspectionForm'>
        
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="#"class="btn btn-primary"id="bto2">Save changes</a>
     
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="RehubicacionModalEdit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Servicio</h4>
      </div>
      <div class="modal-body">
      <div id="relocationForm">
        
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a  class="btn btn-primary" id="bto3">Save changes</a>
     
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
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="bien">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
   <p>
    Guardado en Sistema.
   </p> 
    </div>
  </div>
</div>
{/block}