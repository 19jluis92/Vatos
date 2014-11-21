{extends file="../_Layouts/master.tpl"}
{block name=title}Inspeccion{/block}
{block name=pageheader}Inspeccion{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=Inspection">Mostrar clientes</a>
			</li>
		</ul>
	</div>
	<div class="inspection form large-10 medium-9 columns">
		<form role="form" method="post" accept-charset="utf-8" action="index.php?controller=inspection&view=create">
			<fieldset>
				<legend>Agregar Inspection</legend>
					<div class="row">
						<div class="col-md-4">
	                  <label for="idService" class="input-group-addon">ID servicio</label>
							<input type="number" class="form-control" name="idService" required="required" step="0.01" id="idService">
                	</div>
                	<div class="col-md-4">
	                  <label for="mileage" class="input-group-addon">Kilometraje</label>
							<input type="number" class="form-control" name="mileage" required="required" step="0.01" id="mileage">
                	</div>
	               <div class="col-md-4">
	               	<label for="fuel" class="input-group-addon">Fuel</label>
							<input class="form-control" type="number" name="fuel" required="required" step="0.01" id="fuel">
	                </div>  
              		</div>
              		<br />
	               <div class="row">
	               	<div class="col-md-8">
	                  	<label class="input-group-addon" for="inspectiondate">Inspection Date</label>
								<input class="form-control" type="date" name="inspectiondate" required="required" id="inspectiondate">
	                	</div>
	                	<div class="col-md-4">
	                		<label class="input-group-addon" for="type">Type</label>
	                		<input class="form-control" type="checkbox" name="type" id="type">
	                	</div>  
	               </div>
              		<br />
			</fieldset>
		<button class="pull-right" type="submit">Submit</button>
		</form>
	</div>
</div>
{/block}