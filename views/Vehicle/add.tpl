{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="col-md-8">
         <div class="vehicle form large-10 medium-9 columns">
            <form class="form-horizontal" method="post" accept-charset="utf-8" action="index.php?controller=vehicle&view=create">
               <div style="display:none;">
                  <input type="hidden" name="_method" value="POST">
               </div>
               <fieldset>
                  <legend>
                     Agregar Vehiculo
                  </legend>

                  <div class="input text required input-group">
                     <label for="name" class="input-group-addon">Nombre</label>
                     <input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
                  </div>
                  

                  <br />
                  <div class="input text required input-group">
                     <label for="vin" class="input-group-addon">Vin</label>
                     <input type="text" name="vin" required="required" class="form-control" maxlength="45" id="vin" placeholder="VIN">
                  </div>
                  <br />

                  <div class="input text required input-group">
                     <label for="model" class="input-group-addon">Model</label>
                     <input type="text" name="model" required="required" class="form-control" maxlength="45" id="model" placeholder="Modelo">
                  </div>
                  <br />

                  <div class="input text required input-group">
                     <label for="tipo" class="input-group-addon">Tipo</label>
                     <input type="text" name="tipo" required="required" class="form-control" maxlength="45" id="tipo" placeholder="Tipo">
                  </div>
                  <br />

                  <div class="input text required input-group">
                     <label for="conditions" class="input-group-addon">Condiciones</label>
                     <input type="text" name="conditions" required="required" class="form-control" maxlength="45" id="conditions" placeholder="Condiciones">
                  </div>
                  <br />

                  <div class="input text required input-group">
                     <label for="plates" class="input-group-addon">Placas</label>
                     <input type="text" name="plates" required="required" class="form-control" maxlength="45" id="plates" placeholder="Placas">
                  </div>
                  <br />

                  <div class="input text required input-group">
                     <label for ="color" class="input-group-addon">Color</label>
                     <input type="color" name="color" required="required" class="form-control" id="color" placeholder="Color">
                  </div>
                  <br />

                  <div class="input text required input-group">
                     <label for="year" class="input-group-addon">Año</label>
                     <input type="date" name="anio" class="form-control" required="required" id="anio" placeholder="año">
                  </div>
                  <br />
               </fieldset>
               <button class='pull-right' type="submit">
                  Enviar
               </button>
            </form>
         </div>
   </div>
  <div class="col-md-4">
    <h3>
         Actions
      </h3>
      <ul class="side-nav">
         <li>
            <a href="index.php?controller=vehicle">Mostrar todos los vehiculos</a>
         </li>
      </ul>
  </div>
</div>
{/block}
