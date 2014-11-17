{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions columns large-2 medium-3">
      <h3>Actions</h3>
      <ul class="side-nav">
         <li><a href="index.php?controller=carworkshop">List Car Work Shops</a>
         </li>
      </ul>
   </div>
   <div class="bump form large-10 medium-9 columns">
      <form method="post" accept-charset="utf-8" action="index.php?controller=carworkshop&view=create">
         <fieldset>
            <legend>Add Car Work Shop</legend>
            <div class="input number required">
               <label for="name">Nombre</label>
               <input type="text" name="Name" required="required" id="Name">
            </div>
            <div class="input number required">
               <label for="address">Direccion</label>
               <input type="text" name="address" required="required" id="address">
            </div>
            <div class="input number required">
               <label for="idCity">Id Ciudad</label>
               <input type="number" name="idCity" required="required" id="idCity">
            </div>
         </fieldset>
         <button type="submit">Submit</button>
      </form>
   </div>
            {/block}