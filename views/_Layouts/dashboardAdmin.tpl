{extends file="../_Layouts/master.tpl"}
{block name=title}Servicio{/block}
{block name=pageheader}Servicio{/block}
{block name=head}
{/block}
{block name=body}

<div class="row">
	<div class="col-md-10">
      <table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="index.php?controller=service?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="index.php?controller=service?sort=startDate&amp;direction=asc">Fecha de Inicio</a></th>
					<th><a href="index.php?controller=service?sort=endDate&amp;direction=asc">Fecha de Fin</a></th>
					<th><a href="index.php?controller=service?sort=idCarWorkShop&amp;direction=asc">Id del Taller</a></th>
					<th><a href="index.php?controller=service?sort=idVehicle&amp;direction=asc">Id del Vehiculo</a></th>
					<th><a href="index.php?controller=service?sort=idEmployee&amp;direction=asc">Id Empleado</a></th>

				</tr>
			</thead>
			<tbody>
				{foreach item=service from=$services}

				<tr>
					<td>{$service.id}</td>
					<td>{$service.startDate}</td>
					<td>{$service.endDate}</td>
					<td>{$service.idCarWorkShop}</td>
					<td>{$service.idVehicle}</td>
					<td>{$service.idEmployee}</td>
				</tr>
			</tbody>
			{/foreach}
		</table>
		<div class="paginator">
			<ul class="pagination">
				<li class="prev disabled"><a href="">&lt; Anterior</a></li><li class="next disabled"><a href="">Siguiente &gt;</a></li>		</ul>
				<p>1 of 1</p>
			</div>
		</div>
	</div>

	{/block}