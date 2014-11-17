{extends file="../_Layouts/master.tpl"}
{block name=title}Relocaciones{/block}
{block name=pageheader}Relocaciones{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=Relocation&view=create">Nueva Relocacion</a></li>
      </ul>
   </div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=relocationDate&amp;direction=asc">Fecha de Relocacion</a>
					</th>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=idEmployee&amp;direction=asc">id Empleado</a>
					</th>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=reason&amp;direction=asc">Razon</a>
					</th>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=idDepartment&amp;direction=asc">id Departmento</a>
					</th>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=idService&amp;direction=asc">id Servicio</a>
					</th>
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=user from=$users}

				<tr>
					<td>{$user.id}</td>
					<td>{$user.relocationDate}</td>
					<td>{$user.idEmployee}</td>
					<td>{$user.reason}</td>
					<td>{$user.idDepartment}</td>
					<td>{$user.idService}</td>
					<td class="actions">
						<a href="index.php?controller=Relocation&view=details&id={$user.id}">Mostrar</a>				
						<a href="index.php?controller=Relocation&view=edit&id={$user.id}">Editar</a>		
						<form action="index.php?controller=Relocation&view=delete&id={$user.id}" name="post_State_{$user.id}" style="display:none;" method="POST">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # $user.id?&quot;)) { document.post_Relocation_{$user.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
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