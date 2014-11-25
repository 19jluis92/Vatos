{extends file="../_Layouts/master.tpl"}
{block name=title}Departamentos{/block}
{block name=pageheader}Departamentos{/block}
{block name=head}
{/block}
{block name=body}

<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a  class="list-group-item"  href="index.php?controller=Department&view=create">Agregar Departamento</a></li>
		</ul>
	</div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="index.php?controller=Department&sort=id&amp;direction=asc">Id</a></th>
					<th><a href="index.php?controller=Department&sort=name&amp;direction=asc">Name</a></th>
					<th><a href="index.php?controller=Department&sort=idLocation&amp;direction=asc">IdLocation</a></th>
					<th class="actions">Actions</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=department from=$departments}

				<tr>
					<td>{$department.id}</td>
					<td>{$department.name}</td>
					<td>{$department.idLocation}</td>
					<td class="actions">
					<div class="btn-group" role="group" aria-label="...">
					<a class="btn btn-default" href="index.php?controller=Department&view=details&id={$department.id}">Ver</a>				
						<a class="btn btn-default"  href="index.php?controller=Department&view=edit&id={$department.id}">Editar</a>		
						<form action="index.php?controller=Department&view=delete&id={$department.id}" name="post_department_{$department.id}" style="display:none;" method="post">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a class="btn btn-default"   href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_department_{$department.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
					</div>	
						
					</td>
				</tr>
			</tbody>
			{/foreach}
		</table>
		</br>
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