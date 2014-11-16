{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Brand&view=create">New Brand</a></li>
		</ul>
	</div>
	<div class="brand index large-10 medium-9 columns">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="/vatoscake/brand?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/vatoscake/brand?sort=name&amp;direction=asc">Name</a></th>
					<th class="actions">Actions</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=brand from=$brands}

				<tr>
					<td>{$brand.id}</td>
					<td>{$brand.name}</td>
					<td class="actions">
						<a href="index.php?controller=Brand&view=details&id={$brand.id}">View</a>				
						<a href="index.php?controller=Brand&view=edit&id={$brand.id}">Edit</a>		
						<form action="index.php?controller=Brand&view=delete&id={$brand.id}" name="post_brand_{$brand.id}" style="display:none;" method="post">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_brand_{$brand.id}.submit(); } event.returnValue = false; return false;">Delete</a>
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