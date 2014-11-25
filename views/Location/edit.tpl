{extends file="../_Layouts/master.tpl"}
{block name=title}Lugares{/block}
{block name=pageheader}Lugares{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Actions</h3>
		<ul class="list-group">
			<li>
				<form action="index.php?controller=Location&view=delete&id={$location->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Borrar Lugar
				</a>

			</li>
			<li><a class="list-group-item" href="index.php?controller=Location">Listar Lugares
			</a>
		</li>
		
	</ul>
	
</div>
<div class="bump form large-10 medium-9 columns">
	<form method="post" accept-charset="utf-8" action="index.php?controller=Location&view=edit&id={$location->id}">
		<fieldset>
			<legend>Edit Location</legend>
				<div class="row">
            	<div class="col-md-8">
		  				<label for="name" class="input-group-addon">Nombre</label>
                  <input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre" value="{$location->name}">
            	</div>
               <div class="col-md-4">              
                  <label for ="idCarWorkShop" class="input-group-addon">idCarWorkShop</label>
                  <select name="idCarWorkShop" required="required" class="form-control" id="idCarWorkShop" placeholder="idCarWorkShop">
                   <option value=''>-- none --</option>
                  {html_options options=$carWorkShops}
               	</select>
               </div>  
          	</div>
          	<br />
	</fieldset>
	<button type="submit" class="btn btn-default pull-right">Enviar</
</form>
</div>
</div>
{/block}