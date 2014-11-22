{extends file="../_Layouts/master.tpl"}
{block name=title}Estados{/block}
{block name=pageheader}Estados{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a href="index.php?controller=State&view=create">Nuevo Estado</a></li>
		</ul>
	</div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=State&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=State&amp;sort=name&amp;direction=asc">Nombre</a>
					</th>
					<th>
						<a href="index.php?controller=State&amp;sort=idState&amp;direction=asc">id Estado</a>
					</th>
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=state from=$states}

				<tr>
					<td>{$state.id}</td>
					<td>{$state.Name}</td>
					<td>{$state.IdCountry}</td>
					<td class="actions">
						<a href="index.php?controller=State&view=details&id={$state.id}">Mostrar</a>				
						<a href="index.php?controller=State&view=edit&id={$state.id}">Editar</a>		
						<form action="index.php?controller=State&view=delete&id={$state.id}" name="post_State_{$state.id}" style="display:none;" method="POST">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # $state.id?&quot;)) { document.post_State_{$state.id}.submit(); } event.returnValue = false; return false;">Borrar</a>
					</td>
				</tr>
			</tbody>
			{/foreach}
		</table>
		<div class="paginator">
			<ul class="pagination">
				<li class="prev disabled"><a href="">&lt; Anterior</a></li><li class="next disabled"><a href="">Siguiente &gt;</a></li>		</ul>
				<p>1 de 1</p>
			</div>
	</div>
</div>
	{if isset($deleted)}
	<script type="text/javascript">
		alert("eliminación correcta");
	</script>
	{/if}
	{/block}