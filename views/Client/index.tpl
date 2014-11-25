{extends file="../_Layouts/master.tpl"}
{block name=title}Clientes{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=client&view=create">Agregar Cliente</a></li>
		</ul>
	</div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=client&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=name&amp;direction=asc">Nombre</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=lastname&amp;direction=asc">Apellido</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=rfc&amp;direction=asc">RFC</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=email&amp;direction=asc">Email</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=address&amp;direction=asc">Direccion</a>
					</th>
					</th>
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=client from=$clients}

				<tr>
					<td>{$client.id}</td>
					<td>{$client.Name}</td>
					<td>{$client.LastName}</td>
					<td>{$client.RFC}</td>
					<td>{$client.email}</td>
					<td>{$client.address}</td>
					<td class="actions">
					<div class="btn-group" role="group" aria-label="...">
					<a class="btn btn-default"  href="index.php?controller=client&view=details&id={$client.id}">View</a>	
						<a class="btn btn-default"  href="index.php?controller=client&view=edit&id={$client.id}">Editar</a>			
						<form action="index.php?controller=client&view=delete&id={$client.id}" name="post_client_{$client.id}" style="display:none;" method="POST">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a class="btn btn-default" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_client_{$client.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
					</div>
						
					</td>
				</tr>
			</tbody>
			{/foreach}
		</table>
		<div class="paginator">
			<ul class="pagination">
				<li class="prev disabled"><a href="">&lt; Anterior</a></li><li class="next disabled"><a href="">Siguiente &gt;</a></li>		</ul>
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