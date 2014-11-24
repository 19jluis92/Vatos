{extends file="../_Layouts/master.tpl"}
{block name=title}Lugar{/block}
{block name=pageheader}Lugares{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=Location&view=create">Nuevo Lugar</a></li>
      </ul>
   </div>
	<div class="col-md-10">
      <table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=Location&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=Location&amp;sort=name&amp;direction=asc">Nombre</a>
					</th>
					<th>
						<a href="index.php?controller=Location&amp;sort=idCarWorkShop&amp;direction=asc">idCarWorkShop</a>
					</th>
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=location from=$locations}

				<tr>
					<td>{$location.id}</td>
					<td>{$location.name}</td>
					<td>{$location.idCarWorkShop}</td>
					<td class="actions">
						<div class="btn-group" role="group" aria-label="...">
                  <a  class="btn btn-default" href="index.php?controller=location&view=details&id={$location.id}">Ver</a>           
                  <a  class="btn btn-default" href="index.php?controller=location&view=edit&id={$location.id}">Editar</a>     
                  <form action="index.php?controller=location&view=delete&id={$location.id}" name="post_location_{$location.id}" style="display:none;" method="post">
                     <input type="hidden" name="_method" value="POST">
                  </form>
                  <a  class="btn btn-default" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_location_{$location.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
                  </div>
					</td>
				</tr>
			</tbody>
			{/foreach}
		</table>
		<div class="paginator">
			<ul class="pagination">
				<li class="prev disabled"><a href="">&lt; Anterior</a></li>
				<li class="next disabled"><a href="">Siguiente &gt;</a></li>
			</ul>
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