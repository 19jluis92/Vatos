{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a  class="list-group-item" href="index.php?controller=user&view=create">Nuevo Usuario</a></li>
		</ul>
	</div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=user&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=user&amp;sort=email&amp;direction=asc">Email</a>
					</th>
					<th>
						<a href="index.php?controller=user&amp;sort=Password&amp;direction=asc">Password</a>
					</th>
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=user from=$users}

				<tr>
					<td>{$user.id}</td>
					<td>{$user.email}</td>
					<td>{$user.password}</td>
					<td class="actions">
					<div class="btn-group" role="group" aria-label="...">
						<a class="btn btn-default"   href="index.php?controller=user&view=details&id={$user.id}">Ver</a>				
						<a class="btn btn-default"  href="index.php?controller=user&view=edit&id={$user.id}">Editar</a>		
						<form action="index.php?controller=user&view=delete&id={$user.id}" name="post_user_{$user.id}" style="display:none;" method="POST">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a  class="btn btn-default"  href="#" onclick="if (confirm(&quot;Are you sure you want to delete # $user.id?&quot;)) { document.post_user_{$user.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
						</div>
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