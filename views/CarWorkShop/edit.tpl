{extends file="../_Layouts/master.tpl"}
{block name=title}Editar Taller{/block}
{block name=pageheader}Taller{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=carworkshop">Mostrar todos los talleres</a></li>
      </ul>
   </div>
   <div class="col-md-10">
      <div class="carworkshop form-horizontal large-10 medium-9 columns">
         <form role="form" method="post" accept-charset="utf-8" action="index.php?controller=carworkshop&view=edit&id={$carworkshop->id}">
            <div style="display:none;">
               <input type="hidden" name="_method" value="POST">
            </div>
            <fieldset>
               <legend>
                  Editar Taller
               </legend>

               <div class="row">
                  <div class="col-md-8">
                      <label for="name" class="input-group-addon">Nombre*</label>
                      <input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre" value="{$carworkshop->name}">
                  </div>
                   <div class="col-md-4">              
                      <label for ="idCity" class="input-group-addon">Ciudad*</label>
                      <select name="idCity" required="required" class="form-control" id="idCity" placeholder="idCity">
                       <option value=''>-- none --</option>
                      {html_options options=$cities}
                    </select>
                 </div>  
              </div>
              <br />

            <div class="row">
               <div class="col-md-12">
                   <label for="address" class="input-group-addon">direccion*</label>
                      <input type="text" name="address" required="required" class="form-control" maxlength="45" id="address" placeholder="Direccion" value="{$carworkshop->address}">
              </div>
            </div>
            <br />          
        <br />
   </fieldset>
   <button type="submit" class="btn btn-default pull-right">Enviar</button>
</form>
</div>
</div>
</div>
{/block}
