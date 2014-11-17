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
               <th class="actions">Acciones</th>
            </tr>
         </thead> <tbody>
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