{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Bump&view=create">New Bump</a></li>
		</ul>
	</div>
	<div class="bump index large-10 medium-9 columns">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=Bump&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=Bump&amp;sort=idPiece&amp;direction=asc">idPiece</a>
					</th>
					<th>
						<a href="index.php?controller=Bump&amp;sort=idSeverity&amp;direction=asc">idSeverity</a>
					</th>
					<th>
						<a href="index.php?controller=Bump&amp;sort=idInspection&amp;direction=asc">idInspection</a>
					</th>
					<th class="actions">Actions</th>
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
						<a href="index.php?controller=Bump&view=details&id={$bump.id}">View</a>				
						<a href="index.php?controller=Bump&view=edit&id={$bump.id}">Edit</a>		
						<form action="index.php?controller=Bump&view=delete&id={$bump.id}" name="post_bump_{$bump.id}" style="display:none;" method="post">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_bump_{$bump.id}.submit(); } event.returnValue = false; return false;">Delete</a>
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