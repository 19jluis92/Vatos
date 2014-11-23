{extends file="../_Layouts/master.tpl"}
{block name=title}Ciudades{/block}
{block name=pageheader}Ciudades{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=city&view=create">Nueva Ciudad</a></li>
      </ul>
   </div>
   <div class="col-md-10">
      <table class="table" cellpadding="0" cellspacing="0">
         <thead>
            <tr>
               <th>
                  <a href="index.php?controller=city&amp;sort=id&amp;direction=asc">Id</a>
               </th>
               <th>
                  <a href="index.php?controller=city&amp;sort=name&amp;direction=asc">name</a>
               </th>
               <th>
                  <a href="index.php?controller=city&amp;sort=idState&amp;direction=asc">Estado</a>
               </th>
               <th class="actions">Acciones</th>
            </tr>
         </thead> <tbody>
            {foreach item=city from=$cities}
            <tr>
               <td>{$city.id}</td>
               <td>{$city.name}</td>
               <td>{$city.idState}</td>
               <td class="actions">
               <div class="btn-group" role="group" aria-label="...">
                  <a  class="btn btn-default" href="index.php?controller=city&view=details&id={$city.id}">Ver</a>           
                  <a  class="btn btn-default" href="index.php?controller=city&view=edit&id={$city.id}">Editar</a>     
                  <form action="index.php?controller=city&view=delete&id={$city.id}" name="post_city_{$city.id}" style="display:none;" method="post">
                     <input type="hidden" name="_method" value="POST">
                  <form action="index.php?controller=city&view=delete&id={$city.id}" name="post_city_{$city.id}" style="display:none;" method="post">
                     <input type="hidden" name="_method" value="POST">
                  </form>
                  <a  class="btn btn-default" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_city_{$city.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
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