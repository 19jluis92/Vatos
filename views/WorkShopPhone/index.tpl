{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Telefono{/block}
{block name=pageheader}Telefonos{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=workshopphone&view=create">Nuevo Telefono</a></li>
      </ul>
   </div>
   <div class="col-md-10">
      <table class="table" cellpadding="0" cellspacing="0">
         <thead>
            <tr>
               <th>
                  <a href="index.php?controller=workshopphone&amp;sort=id&amp;direction=asc">Id</a>
               </th>
               <th>
                  <a href="index.php?controller=workshopphone&amp;sort=lada&amp;direction=asc">Lada</a>
               </th>
               <th>
                  <a href="index.php?controller=workshopphone&amp;sort=area&amp;direction=asc">Area</a>
               </th>
               <th>
                  <a href="index.php?controller=workshopphone&amp;sort=number&amp;direction=asc">Numero</a>
               </th>
                <th>
                  <a href="index.php?controller=workshopphone&amp;sort=idcarworkshop&amp;direction=asc">Id Taller Automotriz</a>
               </th>
               <th class="actions">Acciones</th>
            </tr>
         </thead>
         <tbody>
            {foreach item=workshopphone from=$workshopphones}

            <tr>
               <td>{$workshopphone.id}</td>
               <td>{$workshopphone.lada}</td>
               <td class="actions">
               <div class="btn-group" role="group" aria-label="...">
                  <a  class="btn btn-default" href="index.php?controller=workshopphone&view=details&id={$workshopphone.id}">Ver</a>           
                  <a  class="btn btn-default" href="index.php?controller=workshopphone&view=edit&id={$workshopphone.id}">Editar</a>     
                  <form action="index.php?controller=workshopphone&view=delete&id={$workshopphone.id}" name="post_workshopphone_{$workshopphone.id}" style="display:none;" method="post">
                     <input type="hidden" name="_method" value="POST">
                  </form>
                  <a  class="btn btn-default" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_workshopphone_{$workshopphone.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
                  </div>
               </td>
            </tr>
         </tbody>
         {/foreach}
      </table>
      <div class="paginator">
         <ul class="pagination">
            <li class="prev disabled"><a href="">&lt; Anterior</a></li><li class="next disabled"><a href="">Siguiente &gt;</a></li>      </ul>
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