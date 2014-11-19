{extends file="../_Layouts/master.tpl"}
{block name=title}Tipo de Vehiculo{/block}
{block name=head}
{/block}
{block name=body}

<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item"  href="index.php?controller=CarType&view=create">Nuevo Tipo</a></li>
		</ul>
	</div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="/vatoscake/carType?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/vatoscake/carType?sort=name&amp;direction=asc">Name</a></th>
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=carType from=$carTypes}

				<tr>
					<td>{$carType.id}</td>
					<td>{$carType.name}</td>
					<td class="actions">
						<a class="btn btn-default"  href="index.php?controller=CarType&view=details&id={$carType.id}">Ver</a>				
						<a class="btn btn-default"  href="index.php?controller=CarType&view=edit&id={$carType.id}">Editar</a>		
						<form action="index.php?controller=CarType&view=delete&id={$carType.id}" name="post_carType_{$carType.id}" style="display:none;" method="post">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a  class="btn btn-default"  href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_carType_{$carType.id}.submit(); } event.returnValue = false; return false;">Delete</a>
					</td>
				</tr>
			</tbody>
			{/foreach}
		</table>
		<div class="paginator">
			<ul class="pagination">
				<li class="prev disabled"><a href="">&lt; previous</a></li><li class="next disabled"><a href="">next &gt;</a></li>		</ul>
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