{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions columns large-2 medium-3">
      <h3>Actions</h3>
      <ul class="side-nav">
         <li><a href="index.php?controller=workshophone">List  WorkShopPhone</a></li>
      </ul>
   </div>
   <div class="workshophone form large-10 medium-9 columns">
      <form method="post" accept-charset="utf-8" action="index.php?controller=workshophone&view=create"><div style="display:none;">
         <input type="hidden" name="_method" value="POST">
      </div>
         <fieldset>
            <legend>Add WorkShopPhone</legend>
            <div class="input text required">
               <label for="lada">
                  Lada
               </label>
               <input type="text" name="lada" required="required" maxlength="45" id="lada">
            </div>
            <div class="form-group">
               <label for="area">Area</label>
               <input type="text" name="area" required="required" maxlength="45" id="area">
            </div>
            <div class="form-group">
               <label for="number">number</label>
               <input type="text" name="number" required="required" maxlength="45" id="number">
            </div>
            <div class="form-group">
               <label for="idCarWorkShop">Id Car Work Shop</label>
               <input type="number" name="idCarWorkShop" required="required" maxlength="45" id="idCarWorkShop">
            </div>
         </fieldset>
         <button type="submit">Submit</button>
      </form>
   </div>
   </div>
{/block}
