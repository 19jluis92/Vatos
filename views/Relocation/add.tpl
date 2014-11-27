{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Relocacion{/block}
{block name=pageheader}Relocaciones{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=Relocation">Listar Relocacion</a>
			</li>
      </ul>
   </div>
	<div class="brand col-md-10">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Relocation&view=create">
			<fieldset>
				<legend>Agregar Relocacion</legend>

				<div class="row">
					<div class="col-md-6">
						<label for="relocationDate" class="input-group-addon">relocationDate*</label>
						<input type="date" name="relocationDate" required="required" class="form-control" id="relocationDate">
					</div>
					<div class="col-md-6">
                  <label for ="idEmployee" class="input-group-addon">Empleado*</label>
                  <select name="idEmployee" required="required" class="form-control" id="idEmployee" placeholder="id Employee">
                   <option value=''>-- none --</option>
                  {html_options options=$Employees}
                  </select>
   				</div>
            </div>
				<br />

            <div class="row">
               <div class="col-md-6">
                   <label for ="idService" class="input-group-addon">Servicio*</label>
                  <select name="idService" required="required" class="form-control" id="idService" placeholder="id Employee">
                   <option value=''>-- none --</option>
                  {html_options options=$services}
                  </select>
               </div>
               <div class="col-md-6">
                  <label for ="idDepartment" class="input-group-addon">Departamento*</label>
                  <select name="idDepartment" required="required" class="form-control" id="idDepartment" placeholder="idDepartment">
                   <option value=''>-- none --</option>
                  {html_options options=$departments}
                  </select>
               </div>
            </div>
            <br />

            <div class="row">
               <div class="col-md-12">	  				
   					<label for="reason" class="input-group-addon">Razon*</label>
   					<input type="textarea" name="reason" required="required" class="form-control" id="reason" maxlength="200">
   				</div>  
            </div>
            <br />

			</fieldset>
			<button class="pull-right" type="submit">Enviar</button>
		</form>
	</div>
</div>
{/block}