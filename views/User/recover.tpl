{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Usuario{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
  <div class="col-md-12">
    <form method="post" accept-charset="utf-8" action="index.php?controller=User&view=password" class="form-horizontal">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"> 
      </div>
      <fieldset>
        <legend>Ingresa el correo del usuario
        </legend>
        <div class="form-group input-group">
          <label for="email" class="input-group-addon">Email</label>
          <input type="text" name="email" required="required" id="email" placeholder="Email" class="form-control">
        </div>
      </fieldset>
      <button class="btn btn-default pull-right" type="submit">Submit
      </button>
    </form>
  </div>
</div>
{/block}

    