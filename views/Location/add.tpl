{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Lugar{/block}
{block name=pageheader}Lugares{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=Location">Listar lugares</a>
		</ul>
	</div>
	<div class="location col-md-10">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Location&view=create">
			<fieldset>
				<legend>Agregar Lugar</legend>
				<div class="row">
              <div class="col-md-8">
		  				<label for="name" class="input-group-addon">Nombre*</label>
                  <input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">
               </div>
               <div class="col-md-4">              
                  <label for ="idCarWorkShop" class="input-group-addon">idCarWorkShop*</label>
                  <select name="idCarWorkShop" required="required" class="form-control" id="idCarWorkShop" placeholder="idCarWorkShop">
                   <option value=''>-- none --</option>
                  {html_options options=$carWorkShops}
               </div>  
            </div>
            <br />

            <div class="form-group input-group">
	  				
            </select>
				</div>
			</fieldset>
			<button class="pull-right" type="submit">Submit</button>
	</form>
</div>
				{/block}