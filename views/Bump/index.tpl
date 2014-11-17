{extends file="../_Layouts/master.tpl"}
{block name=title}Golpes{/block}
{block name=pageheader}Golpes{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=Bump&view=create">Nuevo golpe</a></li>
      </ul>
   </div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=Bump&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=Bump&amp;sort=idPiece&amp;direction=asc">Id Pieza</a>
					</th>
					<th>
						<a href="index.php?controller=Bump&amp;sort=idSeverity&amp;direction=asc">Id Severidad</a>
					</th>
					<th>
						<a href="index.php?controller=Bump&amp;sort=idInspection&amp;direction=asc">Id Inspeccion</a>
					</th>
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=bump from=$bumps}

				<tr>
					<td>{$bump.id}</td>
					<td>{$bump.idPiece}</td>
					<td>{$bump.idSeverity}</td>
					<td>{$bump.idInspection}</td>
					<td class="actions">
						<a href="index.php?controller=Bump&view=details&id={$bump.id}">Mostrar</a>				
						<a href="index.php?controller=Bump&view=edit&id={$bump.id}">Editar</a>		
						<form action="index.php?controller=Bump&view=delete&id={$bump.id}" name="post_bump_{$bump.id}" style="display:none;" method="post">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_bump_{$bump.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
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