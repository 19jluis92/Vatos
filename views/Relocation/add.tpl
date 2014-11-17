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
						<label for="id" class="input-group-addon">Id Relocacion</label>
						<input type="number" name="id" required="required" class="form-control" id="id">
					</div>
					<div class="col-md-6">
                  <label class="input-group-addon" for="name" class="input-group-addon">Nombre</label>
                  <input type="text" name="name" required="required" class="form-control" maxlength="45" id="name" placeholder="Nombre">  				
					</div>
				</div>
				<br />

				<div class="row">
                <div class="col-md-3">
                  <label class="input-group-addon" for="idService">id Servicio</label>
						<input type="number" class="form-control" name="idService" required="required" id="idService">
                </div>
                <div class="col-md-3">
						<label class="input-group-addon" for="name">Fecha de relocacion</label>
						<input type="date" class="form-control" name="relocationDate" required="required" id="relocationDate">
                </div>

                <div class="col-md-3">
						<label class="input-group-addon" for="idEmployee">id Empleado</label>
						<input type="number" class="form-control" name="idEmployee" required="required" id="idEmployee">
                </div>

                <div class="col-md-3">
                  <label class="input-group-addon" for="idDepartment">id Departmento</label>
						<input type="number" class="form-control" name="idDepartment" required="required" id="idDepartment">
                </div>
            </div>
            <br />

            <div class="form-group input-group">	  				
					<label for="reason" class="input-group-addon">Razon</label>
					<input type="textarea" name="reason" required="required" class="form-control" id="reason">
				</div>  
            <br />

			</fieldset>
			<button class="pull-right" type="submit">Enviar</button>
		</form>
	</div>
</div>
{/block}