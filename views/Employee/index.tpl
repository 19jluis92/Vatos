{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul  class="list-group">
			<li><a class="list-group-item" href="index.php?controller=employee&view=create">Agregar Empleado</a></li>
		</ul>
	</div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=employee&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=employee&amp;sort=name&amp;direction=asc">Name</a>
					</th>
					<th>
						<a href="index.php?controller=employee&amp;sort=lastName&amp;direction=asc">Last Name</a>
					</th>
					<th>
						<a href="index.php?controller=employee&amp;sort=nss&amp;direction=asc">nss</a>
					</th>
					<th>
						<a href="index.php?controller=employee&amp;sort=address&amp;direction=asc">Address</a>
					</th>
					<th>
						<a href="index.php?controller=employee&amp;sort=Phone&amp;direction=asc">Phone</a>
					</th>
					<th>
						<a href="index.php?controller=employee&amp;sort=cellphone&amp;direction=asc">Cell Phone</a>
					</th>
					<th class="actions">Actions</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=user from=$users}

				<tr>
					<td>{$user.id}</td>
					<td>{$user.name}</td>
					<td>{$user.lastName}</td>
					<td>{$user.nss}</td>
					<td>{$user.address}</td>
					<td>{$user.phone}</td>
					<td>{$user.cellphone}</td>
					
					<td class="actions">
						<a class="btn btn-default" href="index.php?controller=employee&view=details&id={$user.id}">View</a>				
						<a class="btn btn-default" href="index.php?controller=employee&view=edit&id={$user.id}">Edit</a>		
						<form action="index.php?controller=employee&view=delete&id={$user.id}" name="post_employee_{$user.id}" style="display:none;" method="POST">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a class="btn btn-default"  href="#" onclick="if (confirm(&quot;Are you sure you want to delete # $user.id?&quot;)) { document.post_user_{$user.id}.submit(); } event.returnValue = false; return false;">Delete</a>
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