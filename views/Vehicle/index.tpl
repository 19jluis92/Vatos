{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions columns large-2 medium-3">
      <h3>Actions</h3>
      <ul class="side-nav">
         <li><a href="index.php?controller=vehicle&view=create">New vehicle</a></li>
      </ul>
   </div>
   <div class="vehicle index large-10 medium-9 columns">
      <table cellpadding="0" cellspacing="0">
         <thead>
            <tr>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=id&amp;direction=asc">Id</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=vin&amp;direction=asc">vin</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=model&amp;direction=asc">model</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=color&amp;direction=asc">color</a>
               </th>
               <th class="actions">Actions</th>
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