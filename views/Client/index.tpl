{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
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
						<a href="index.php?controller=client&amp;sort=name&amp;direction=asc">Name</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=lastname&amp;direction=asc">Last Name</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=rfc&amp;direction=asc">rfc</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=clientCol&amp;direction=asc">Colonia</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=clientCol1&amp;direction=asc">Colonia 2</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=phone&amp;direction=asc">phone</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=lada&amp;direction=asc">lada</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=area&amp;direction=asc">area</a>
					</th>
					<th class="actions">Actions</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=user from=$users}

				<tr>
					<td>{$user.id}</td>
					<td>{$user.name}</td>
					<td>{$user.LastName}</td>
					<td>{$user.rfc}</td>
					<td>{$user.ClientCol}</td>
					<td>{$user.ClientCol1}</td>
					<td>{$user.phone}</td>
					<td>{$user.lada}</td>
					<td>{$user.area}</td>
					<td class="actions">
					<div class="btn-group" role="group" aria-label="...">
					<a class="btn btn-default"  href="index.php?controller=client&view=details&id={$user.id}">View</a>				
						<a class="btn btn-default" href="index.php?controller=client&view=edit&id={$user.id}">Edit</a>		
						<form action="index.php?controller=client&view=delete&id={$user.id}" name="post_user_{$user.id}" style="display:none;" method="POST">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a class="btn btn-default" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_user_{$user.id}.submit(); } event.returnValue = false; return false;">Delete</a>
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