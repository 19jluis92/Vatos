{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Vehiculo{/block}
{block name=pageheader}Vehiculos{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=vehicle">Mostrar todos los vehiculos</a></li>
      </ul>
   </div>
   <div class="col-md-10">
      <div class="vehicle form-horizontal large-10 medium-9 columns">
         <form role="form" method="post" accept-charset="utf-8" action="index.php?controller=Vehicle&view=create">
            <div style="display:none;">
               <input type="hidden" name="_method" value="POST">
            </div>
            <fieldset>
               <legend>
                  Agregar Vehiculo
               </legend>

              <div class="row">
                <div class="col-md-8">
                  <label for="name" class="input-group-addon">Nombre</label>
                  <input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
                </div>
                <div class="col-md-4">
                  <label for="vin" class="input-group-addon">Vin</label>
                  <input type="text" name="vin" required="required" class="form-control" maxlength="45" id="vin" placeholder="VIN">
                </div>  
              </div>
              <br />

            <div class="row">
               <div class="col-md-6">
                  <label for="type" class="input-group-addon">Tipo</label>
                  <select name="type" required="required" id="type" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options options=$carTypes}
                 </select>
              </div>

              <div class="col-md-3">
               <label for="model" class="input-group-addon">Model</label>
               <select name="model" required="required" class="form-control" maxlength="45" id="model" placeholder="Modelo">
                   <option value=''>-- none --</option>
                  {html_options options=$models}
            </select>
            </div>
            <div class="col-md-3">
               <label for="conditions" class="input-group-addon">Condiciones</label>
               <input type="text" name="conditions" required="required" class="form-control" maxlength="45" id="conditions" placeholder="Condiciones">
            </div>
         </div>
         <br />

         <div class="row">
          <div class="col-md-6">
            <label for="plates" class="input-group-addon">Placas</label>
            <input type="text" name="plates" required="required" class="form-control" maxlength="45" id="plates" placeholder="Placas">
         </div>
         <div class="col-md-4">
            <label for="year" class="input-group-addon">Año</label>
            <input type="number" name="year" class="form-control" required="required" id="year" placeholder="1985" pattern="[0-9]*" value="1900">
         </div>  
         <div class="col-md-2">
            <label for ="color" class="input-group-addon">Color</label>
            <select name="color" required="required" class="form-control" id="color" placeholder="Color">
                   <option value=''>-- none --</option>
                  {html_options options=$colors}
            </select>
         </div>
      </div>          
      <br />
   </fieldset>
   <button type="submit" class="btn btn-primary pull-right">Enviar</button>
</form>
</div>
</div>
</div>
{/block}
