{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions columns large-2 medium-3">
      <h3>
         Actions
      </h3>
      <ul class="side-nav">
         <li>
            <a href="index.php?controller=vehicle">Mostrar todos los vehiculos</a>
         </li>
      </ul>
   </div>
   <div class="container">
      <div class="vehicle form large-10 medium-9 columns">
         <form class="form-horizontal" method="post" accept-charset="utf-8" action="index.php?controller=vehicle&view=create">
            <div style="display:none;">
               <input type="hidden" name="_method" value="POST">
            </div>
            <fieldset>
               <legend>
                  Agregar Vehiculo
               </legend>
               <div class="form-group">
                  <label for="name">vin</label>
                  <input type="text" name="name" required="required" maxlength="45" id="name">
               </div>
               <div class="form-group">
                  <label for="model">Model</label>
                  <input type="text" name="model" required="required" id="model"></div>
               </div>
               <div class="form-group">
                  <label for ="color">Color</label>
                  <input type="color" name="color" required="required" id="color" placeholder="Color">
               </div>
                  <label for="year">Año</label>
                  <input type="date" name="anio" required="required" id="anio" placeholder="año">
               <div class="form-group">
                  <label for="type">Tipo</label>
                  <input type="text" name="type" required="required" id="type" placeholder="Tipo">
               </div>
               <div class="form-group">
                  <label for="conditions">Condiciones</label>
                  <input type="text" name="conditions" required="required" id="conditions" placeholder="Condiciones">
               </div>
               <div class="form-group">
                  <label for="plates">Placas</label>
                  <input type="text" name="plates" required="required" id="plates" placeholder="Placas">
               </div>
            </fieldset>
            <button class='pull-right' type="submit">
               Enviar
            </button>
         </form>
   </div>
</div>
</div>
{/block}