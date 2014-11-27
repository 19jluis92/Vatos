{extends file="../_Layouts/master.tpl"}
{block name=title}Vehiculos{/block}
{block name=pageheader}Vehiculos{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=vehicle&view=create">Nuevo Vehiculo</a></li>
      </ul>
   </div>
   <div class="col-md-10">
      <table class="table" cellpadding="0" cellspacing="0">
         <thead>
            <tr>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=id&amp;direction=asc">Id</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=vin&amp;direction=asc">Vin</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=model&amp;direction=asc">Modelo</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=color&amp;direction=asc">Color</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=year&amp;direction=asc">Anio</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=type&amp;direction=asc">Tipo</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=characteristics&amp;direction=asc">Caracteristicas</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=plates&amp;direction=asc">Placas</a>
               </th>
               <th class="actions">Acciones</th>
            </tr>
         </thead> <tbody>
            {foreach item=vehicle from=$vehicles}
            <tr>
               <td>{$vehicle.id}</td>
               <td>{$vehicle.vin}</td>
               <td>{$vehicle.idModel}</td>
               <td>{$vehicle.idColor}</td>
               <td>{$vehicle.year}</td>
               <td>{$vehicle.idCarType}</td>
               <td>{$vehicle.characteristics}</td>
               <td>{$vehicle.plates}</td>
               <td class="actions">
               <div class="btn-group" role="group" aria-label="...">
                  <a  class="btn btn-default" href="index.php?controller=Vehicle&view=details&id={$vehicle.id}">Ver</a>           
                  <a  class="btn btn-default" href="index.php?controller=Vehicle&view=edit&id={$vehicle.id}">Editar</a>     
                  <form action="index.php?controller=Vehicle&view=delete&id={$vehicle.id}" name="post_vehicle_{$vehicle.id}" style="display:none;" method="post">
                     <input type="hidden" name="_method" value="POST">
                  </form>
                  <a  class="btn btn-default" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_vehicle_{$vehicle.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
                  </div>
               </td>
            </tr>
            {/foreach}
         </tbody>icle
      </table>
      <div class="paginator">
         <ul class="pagination">
            <li class="prev disabled"><a href="">&lt; previous</a></li><li class="next disabled"><a href="">next &gt;</a></li>      </ul>
            <p>1 of 1</p>
         </div>
      </div>
   </div>
   {if isset($deleted)}
   <script type="text/javascript">
      alert("eliminación correcta");
   </script>
   {/if}
   {/block}