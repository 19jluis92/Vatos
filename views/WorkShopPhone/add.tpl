{extends file="../_Layouts/master.tpl"}
{block name=title}Telefonos{/block}
{block name=pageheader}Telefonos{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=workshopphone">Listar Telefonos de talleres</a></li>
      </ul>
   </div>
   <div class="workshopphone col-md-10">
      <form method="post" accept-charset="utf-8" action="index.php?controller=workshophone&view=create"><div style="display:none;">
         <input type="hidden" name="_method" value="POST">
      </div>
         <fieldset>
            <legend>Agregar Telefono de taller</legend>

            <div class="row">
               <div class="col-md-2">
                  <label for="lada" class="input-group-addon">+</label>
                  <input type="text" name="lada" required="required" class="form-control" maxlength="45" id="lada" placeholder="Lada">
               </div>
               <div class="col-md-4">
                  <label for="area" class="input-group-addon">Area</label>
                  <input type="text" name="name" required="required" class="form-control" maxlength="45" id="area" placeholder="Area">
               </div>
               <div class="col-md-6">
                  <label for="number" class="input-group-addon">Numero</label>
                  <input type="text" name="number" required="required" class="form-control" maxlength="45" id="number" placeholder="Numero">
               </div> 
            </div>
            <br />

            <div class="form-group input-group">
               <label for="idcarworkshop" class="input-group-addon">Id Taller</label>
               <input type="number" name="idcarworkshop" required="required" class="form-control" maxlength="45" id="idcarworkshop" placeholder="Id Taller">
            </div>

         </fieldset>
         <button class="pull-right" type="submit">Enviar</button>
      </form>
   </div>
   </div>
{/block}
