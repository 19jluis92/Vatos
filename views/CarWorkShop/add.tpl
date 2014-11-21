{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Taller automotriz{/block}
{block name=pageheader}Taller automotriz{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=carworkshop">Listar Talleres</a>
         </li>
      </ul>
   </div>
   <div class="brand col-md-10">
      <form method="post" accept-charset="utf-8" action="index.php?controller=carworkshop&view=create">
         <fieldset>
            <legend>Agregar Taller automotriz</legend>
            <div class="form-group input-group">
               <label for="name" class="input-group-addon">Nombre</label>
               <input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
            </div>

            <div class="form-group input-group">
               <label for="address" class="input-group-addon">Direccion</label>
               <input type="text" name="address" required="required" class="form-control" maxlength="45" id="address" placeholder="Direccion">
            </div>

            <div class="form-group input-group">
               <label for="idCity" class="input-group-addon">Id Ciudad</label>
                  <select name="idCity" required="required" class="form-control"id="idCity" placeholder="Id Ciudad">
                   <option value=''>-- none --</option>
                  {html_options options=$cities}
            </select>
            </div>

         </fieldset>
         <button class="pull-right" type="submit">
            Enviar
         </button>
      </form>
   </div>
            {/block}