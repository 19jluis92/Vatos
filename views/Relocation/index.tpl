{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Relocation&view=create">New Relocation</a></li>
		</ul>
	</div>
	<div class="Bump index large-10 medium-9 columns">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=relocationDate&amp;direction=asc">relocationDate</a>
					</th>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=idEmployee&amp;direction=asc">idEmployee</a>
					</th>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=reason&amp;direction=asc">reason</a>
					</th>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=idDepartment&amp;direction=asc">idDepartment</a>
					</th>
					<th>
						<a href="index.php?controller=Relocation&amp;sort=idService&amp;direction=asc">idService</a>
					</th>
					<th class="actions">Actions</th>
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
						<a href="index.php?controller=Relocation&view=details&id={$user.id}">View</a>				
						<a href="index.php?controller=Relocation&view=edit&id={$user.id}">Edit</a>		
						<form action="index.php?controller=Relocation&view=delete&id={$user.id}" name="post_State_{$user.id}" style="display:none;" method="POST">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # $user.id?&quot;)) { document.post_Relocation_{$user.id}.submit(); } event.returnValue = false; return false;">Delete</a>
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