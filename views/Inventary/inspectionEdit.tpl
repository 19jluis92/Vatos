<div id="inspection-edit-form" class="inspection form large-10 medium-9 columns">
	<form method="post" accept-charset="utf-8" class="form-horizontal"  action="index.php?controller=inventory&view=inspectionEdit&id={$inspection->id}">
		<fieldset>
			<input type="hidden" name="id"  id="id" value="{$inspection->id}" class="form-control">
			<input type="hidden" name="idService" id="idService" value="{$inspection->idService}" class="form-control">
			<div class="form-group input-group">
				<label  class="input-group-addon" for="mileage">Kilometraje</label>
				<input  class="form-control" type="number" name="mileage" required="required" step="0.01" id="mileage" value="{$inspection->mileage}"></div>
				<div class="form-group input-group">
					<label  class="input-group-addon" for="fuel">Gasolina</label>
					<input class="form-control" type="number" name="fuel" required="required" step="0.01" id="fuel" value="{$inspection->fuel}"></div>
					<div class="form-group input-group"><label  class="input-group-addon" for="inspectionDate">fecha de Inpecciòn</label>
						<input class="form-control" type="text" name="inspectionDate" required="required" id="inspectionDate" value="{$inspection->inspectionDate|date_format:"%d/%m/%Y %H:%M:%S"}">
					</div>
					<div class="form-group input-group">
						<label  class="input-group-addon" for="type">tipo</label>
						<select class="form-control" id="type" name="type">
							<option {if !$inspection->type} selected="selected" {/if} value="0">Entrada</option>
							<option  {if $inspection->type} selected="selected" {/if} value="1">Salida</option>
						</select>
					</fieldset>
				</form>
			</div>

			{literal}
			<script type="text/javascript">
				$('#inspection-edit-form #inspectionDate').datetimepicker({
					useSeconds : true,
					format: 'DD/MM/YYYY HH:mm:ss',
			        use24hours: true,        
					language: "es" });

			</script>
			{/literal}