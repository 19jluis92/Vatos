{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}

<div class="row">
	<div class="actions col-md-2">
      <h3>Acciones</h3>
      <ul class="list-group">
         <li><a class="list-group-item" href="index.php?controller=Inspection&view=create">Nueva Inspeccion</a></li>
		</ul>
      </ul>
   </div>
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="/vatoscake/inspection?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/vatoscake/inspection?sort=idService&amp;direction=asc">ID Servicio</a></th>
					<th><a href="/vatoscake/inspection?sort=mileage&amp;direction=asc">Kilometraje</a></th>
					<th><a href="/vatoscake/inspection?sort=fuel&amp;direction=asc">Combustible</a></th>
					<th><a href="/vatoscake/inspection?sort=inspectionDate&amp;direction=asc">Fecha de inspeccion</a></th>
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=inspection from=$inspections}

				<tr>
					<td>{$inspection.id}</td>
					<td>{$inspection.idService}</td>
					<td>{$inspection.mileage}</td>
					<td>{$inspection.fuel}</td>
					<td>{$inspection.inspectionDate}</td>
					<td class="actions">
						<a  class="btn btn-default" href="index.php?controller=inspection&view=details&id={$inspection.id}">Ver</a>           
                  <a  class="btn btn-default" href="index.php?controller=inspection&view=edit&id={$inspection.id}">Editar</a>     
                  <form action="index.php?controller=inspection&view=delete&id={$inspection.id}" name="post_inspection_{$inspection.id}" style="display:none;" method="post">
                     <input type="hidden" name="_method" value="POST">
                  </form>
                  <a  class="btn btn-default" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_inspection_{$inspection.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
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