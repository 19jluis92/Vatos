{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}

<div class="row">
	<div class="actions col-md-2">
		<h3>Actions</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=Color&view=create">Nuevo Color</a></li>
		</ul>
	</div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="/vatoscake/color?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/vatoscake/color?sort=name&amp;direction=asc">Name</a></th>
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=color from=$colors}

				<tr>
					<td>{$color.id}</td>
					<td>{$color.name}</td>
					<td class="actions">
						<a href="index.php?controller=Color&view=details&id={$color.id}">Mostrar</a>				
						<a href="index.php?controller=Color&view=edit&id={$color.id}">Editar</a>		
						<form action="index.php?controller=Color&view=delete&id={$color.id}" name="post_color_{$color.id}" style="display:none;" method="post">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_color_{$color.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
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