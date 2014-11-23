{extends file="../_Layouts/master.tpl"}
{block name=title}Editar Ciudad{/block}
{block name=pageheader}Ciudad{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=city">Mostrar todas las ciudades</a></li>
      </ul>
   </div>
   <div class="col-md-10">
      <div class="city form-horizontal large-10 medium-9 columns">
         <form role="form" method="post" accept-charset="utf-8" action="index.php?controller=city&view=edit&id={$city->id}">
            <div style="display:none;">
               <input type="hidden" name="_method" value="POST">
            </div>
            <fieldset>
               <legend>
                  Editar Ciudad
               </legend>
             <div class="row">
              <div class="col-md-6">
                  <label for="vin" class="input-group-addon">Name</label>
                  <input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="name" value="{$city->name}">
              </div>
              <div class="col-md-6">
                 <label for="idState" class="input-group-addon">Estado</label>
                  <select name="idState" required="required" id="idState" class="form-control">
                    <option value=''>-- none --</option>
                    {html_options selected=$city->idState options=$states}
                 </select>
              </div>
            </div>
            <br />

        
      </div>          
      <br />
   </fieldset>
   <button type="submit" class="btn btn-primary pull-right">Enviar</button>
</form>
</div>
</div>
</div>
{/block}
