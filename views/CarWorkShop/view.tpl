{extends file="../_Layouts/master.tpl"}
{block name=title}Ver vehiculo{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=carworkshop">Listar Talleres</a>
         </li>
          <li><a class="list-group-item" href="index.php?controller=carworkshop&view=edit&id={$carworkshop->id}">Editar Taller</a> </li>
         <li><form action="index.php?controller=carworkshop&view=delete&id={$carworkshop->id}" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form><a class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_carworkshop.submit(); } event.returnValue = false; return false;">Eliminar Taller</a> </li>
         <li><a  class="list-group-item"href="index.php?controller=carworkshop&view=create">Nuevo Taller</a> </li>
      </ul>
   </div>
   <div class="col-md-10">
      <div class="row">
         <div class="col-md-3">
            <h6 class="subheader">Id</h6>
            <p>{$carworkshop->id}</p>
         </div>
         <div class="col-md-3">
            <h6 class="subheader">Name</h6>
            <p>{$carworkshop->name}</p>
         </div>
         <div class="col-md-3">
            <h6 class="subheader">IdCity</h6>
            <p>{$carworkshop->idCity}</p>
         </div>
         <div class="col-md-3">
            <h6 class="subheader">Direccion</h6>
            <p>{$carworkshop->address}</p>
         </div>
      </div>
   </div>
</div>
{/block}