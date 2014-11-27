        <form role="form" method="post" id="relocation-edit-form" accept-charset="utf-8" action="index.php?controller=relocation&view=create">
          <fieldset>
          <input type="hidden" name="id" id="id" value="{$relocation->id}">
            <input type="hidden" name="idService" id="idService" value="{$relocation->idService}">
            <div class="row">
              <div class="form-group input-group">
                <label for="relocationDate" class="input-group-addon">Fecha *</label>
                <input value="{$relocation->relocationDate|date_format:"%d/%m/%Y %H:%M:%S"}" type="text" name="relocationDate" required="required" class="date-time form-control" id="relocationDate">
              </div>
              <div class="form-group input-group">
                <label for ="idDepartment" class="input-group-addon">Departamento *</label>
                <select name="idDepartment" required="required" class="form-control" id="idDepartment" placeholder="idDepartment">
                 <option value=''>-- none --</option>
                 {html_options selected=$relocation->idDepartment options=$departments}
               </select>
             </div>
             <div class="form-group input-group">
              <label for="reason" class="input-group-addon">Razón *</label>
              <textarea name="reason" required="required" class="form-control" id="reason" maxlength="200">{$relocation->reason}</textarea>
            </div>  
          </div>
        </fieldset>
      </form>

      {literal}
			<script type="text/javascript">
				$('#relocation-edit-form #relocationDate').datetimepicker({
					useSeconds : true,
					format: 'DD/MM/YYYY HH:mm:ss',
			        use24hours: true,        
					language: "es" });

			</script>
			{/literal}