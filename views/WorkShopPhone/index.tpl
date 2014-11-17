{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions columns large-2 medium-3">
      <h3>Actions</h3>
      <ul class="side-nav">
         <li><a href="index.php?controller=workshopphone&view=create">New workshopphone</a></li>
      </ul>
   </div>
   <div class="workshopphone index large-10 medium-9 columns">
      <table cellpadding="0" cellspacing="0">
         <thead>
            <tr>
               <th>
                  <a href="index.php?controller=workshopphone&amp;sort=id&amp;direction=asc">Id</a>
               </th>
               <th>
                  <a href="index.php?controller=workshopphone&amp;sort=lada&amp;direction=asc">lada</a>
               </th>
               <th>
                  <a href="index.php?controller=workshopphone&amp;sort=area&amp;direction=asc">area</a>
               </th>
               <th>
                  <a href="index.php?controller=workshopphone&amp;sort=number&amp;direction=asc">number</a>
               </th>
                <th>
                  <a href="index.php?controller=workshopphone&amp;sort=idcarworkshop&amp;direction=asc">Id Car Work Shop</a>
               </th>
               <th class="actions">Actions</th>
            </tr>
         </thead>
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