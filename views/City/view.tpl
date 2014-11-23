{extends file="../_Layouts/master.tpl"}
{block name=title}Ver Ciudad{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions columns large-2 medium-3">
      <h3>Acciones</h3>
      <ul class="side-nav">
         <li><a href="index.php?controller=city&view=edit&id={$city->id}">Editar ciudad</a> </li>
         <li><form action="index.php?controller=city&view=delete&id={$city->id}" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form><a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_city.submit(); } event.returnValue = false; return false;">Elimnar ciudad</a> </li>
         <li><a href="index.php?controller=city">Listar ciudades</a> </li>
         <li><a href="index.php?controller=city&view=create">Nueva ciudad</a> </li>
      </ul>
   </div>
   <div class="city view large-10 medium-9 columns">
      <h2>{$city->id}</h2>
      <div class="row">
         <div class="col-md-4">
            <h6 class="subheader">Id</h6>
            <p>{$city->id}</p>
         </div>
         <div class="col-md-4">
            <h6 class="subheader">Name</h6>
            <p>{$city->name}</p>
         </div>
         <div class="col-md-4">
            <h6 class="subheader">IdState</h6>
            <p>{$city->idState}</p>
         </div>
      </div>
   </div>
</div>
{/block}