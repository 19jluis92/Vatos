{extends file="../_Layouts/master.tpl"}
{block name=title}Ver vehiculo{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions columns large-2 medium-3">
      <h3>Actions</h3>
      <ul class="side-nav">
         <li><a href="index.php?controller=carworkshop&view=edit&id={$carworkshop->id}">Edit carworkshop</a> </li>
         <li><form action="index.php?controller=carworkshop&view=delete&id={$carworkshop->id}" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form><a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_carworkshop.submit(); } event.returnValue = false; return false;">Delete carworkshop</a> </li>
         <li><a href="index.php?controller=carworkshop">List carworkshop</a> </li>
         <li><a href="index.php?controller=carworkshop&view=create">New carworkshop</a> </li>
      </ul>
   </div>
   <div class="carworkshop view large-10 medium-9 columns">
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