{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}

<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Inspection&view=create">New Inspection</a></li>
		</ul>
	</div>
	<div class="inspection index large-10 medium-9 columns">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="/vatoscake/inspection?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/vatoscake/inspection?sort=idService&amp;direction=asc">IdService</a></th>
					<th><a href="/vatoscake/inspection?sort=mileage&amp;direction=asc">Mileage</a></th>
					<th><a href="/vatoscake/inspection?sort=fuel&amp;direction=asc">Fuel</a></th>
					<th><a href="/vatoscake/inspection?sort=inspectionDate&amp;direction=asc">InspectionDate</a></th>
					<th class="actions">Actions</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=inspection from=$inspections}

				<tr>
					<td>{$inspection.id}</td>
					<td>{$inspection.idService}</td>
					<td>{$inspection.mileage}</td>
					<td>{$inspection.fuel}</td>
					<td>{$inspection.InspectionDate}</td>
					<td class="actions">
						<a href="index.php?controller=Inspection&view=details&id={$inspection.id}">View</a>				
						<a href="index.php?controller=Inspection&view=edit&id={$inspection.id}">Edit</a>		
						<form action="index.php?controller=Inspection&view=delete&id={$inspection.id}" name="post_inspection_{$inspection.id}" style="display:none;" method="post">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_inspection_{$inspection.id}.submit(); } event.returnValue = false; return false;">Delete</a>
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