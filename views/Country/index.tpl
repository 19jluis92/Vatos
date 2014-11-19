{extends file="../_Layouts/master.tpl"}
{block name=title}Paises{/block}
{block name=pageheader}Paises{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a href="index.php?controller=Country&view=create">Nuevo Pais</a></li>
      </ul>
   </div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=Country&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=Country&amp;sort=name&amp;direction=asc">Nombre</a>
					</th>
					
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=country from=$Countrys}

				<tr>
					<td>{$country.id}</td>
					<td>{$country.name}</td>
					<td class="actions">
						<a href="index.php?controller=Country&view=details&id={$country.id}">View</a>				
						<a href="index.php?controller=Country&view=edit&id={$country.id}">Edit</a>		
						<form action="index.php?controller=Country&view=delete&id={$country.id}" name="post_user_{$country.id}" style="display:none;" method="POST">
							<input type="hidden" name="_method" value="POST">
						</form>
						<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # $country.id?&quot;)) { document.post_Country_{$country.id}.submit(); } event.returnValue = false; return false;">Delete</a>
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