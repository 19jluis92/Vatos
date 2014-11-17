{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}

<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Service&view=create">New Service</a></li>
		</ul>
	</div>
	<div class="service index large-10 medium-9 columns">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="index.php?controller=service?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="index.php?controller=service?sort=startDate&amp;direction=asc">StartDate</a></th>
					<th><a href="index.php?controller=service?sort=endDate&amp;direction=asc">EndDate</a></th>
					<th><a href="index.php?controller=service?sort=idCarWorkShop&amp;direction=asc">IdCarWorkShop</a></th>
					<th><a href="index.php?controller=service?sort=idVehicle&amp;direction=asc">IdVehicle</a></th>
					<th><a href="index.php?controller=service?sort=idEmployee&amp;direction=asc">IdEmployee</a></th>
					<th class="actions">Actions</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=service from=$services}

				<tr>
					<td>{$service.id}</td>
					<td>{$service.startDate}</td>
					<td>{$service.endDate}</td>
					<td>{$service.idVarWorkShop}</td>
					<td>{$service.idVehicle}</td>
					<td>{$service.idEmployee}</td>
					<td class="actions">
						<a href="index.php?controller=Service&view=details&id={$service.id}">View</a>				
						<a href="index.php?controller=Service&view=edit&id={$service.id}">Edit</a>		
						<form action="index.php?controller=Service&view=delete&id={$service.id}" name="post_service_{$service.id}" style="display:none;" method="post">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_service_{$service.id}.submit(); } event.returnValue = false; return false;">Delete</a>
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