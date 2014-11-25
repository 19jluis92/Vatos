<div id="relocationChild" class="bump form large-10 medium-9 columns">
  <legend>Agregar Relocacion</legend>

        <div class="row">
          <div class="form-group input-group">
            
            <input type="hidden" name="id" required="required" class="form-control " id="id">
          </div>
          
        </div>
        <br />

        <div class="row">
                <div class="form-group input-group">
                  <label class="input-group-addon" for="idService">id Servicio</label>
            <input type="number" class="form-control idservins" name="idService" required="required" step="0.01" id="idServiceInspection" readonly>
                </div>
                <div class="form-group input-group">
            <label class="input-group-addon" for="name">Fecha de relocacion</label>
            <input type="date" class="form-control bloqrelo" name="relocationDate" required="required" id="relocationDate">
                </div>

                <div class="form-group input-group">
           
            <input type="hidden"  class="form-control bloqrelo" name="idEmployee" required="required" id="idEmployee" readonly>
                </div>

                <div class="form-group input-group">
                  <label class="input-group-addon" >Departamento</label>
                  <select required="required"  id="idDepartment"class="form-control bloqrelo">
            <option value=''>-- none --</option> </select>
            
                </div>
            </div>
            <br />

            <div class="form-group input-group">            
          <label for="reason" class="input-group-addon">Razon</label>
          <input type="textarea" name="reason" required="required" class="form-control bloqrelo" id="reason">
        </div>  
      <a  class="btn btn-primary" id="bto3">Save changes</a>
</div>