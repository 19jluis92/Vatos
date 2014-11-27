{extends file="../_Layouts/master.tpl"}
{block name=title}Ver vehiculo{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="col-md-2">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Vehicle&view=edit&id={$vehicle->id}">Edit Vehicle</a> </li>
			<li><form action="index.php?controller=Vehicle&view=delete&id={$vehicle->id}" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form><a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_vehicle.submit(); } event.returnValue = false; return false;">Delete Vehicle</a> </li>
			<li><a href="index.php?controller=Vehicle">List Vehicle</a> </li>
			<li><a href="index.php?controller=Vehicle&view=create">New Vehicle</a> </li>
		</ul>
	</div>
	<div class="col-md-10">
		<h2>VIN</h2>
		<h2>{$vehicle->vin}</h2>
		<div class="row">
			<div class="large-5 columns strings">
				<h6 class="subheader">Nombre</h6>
				<p>{$vehicle->vin}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Id</h6>
				<p>{$vehicle->id}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Modelo</h6>
				<p>{$vehicle->idModel}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Color</h6>
				<p>{$vehicle->idColor}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Anio</h6>
				<p>{$vehicle->year}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">characteristics</h6>
				<p>{$vehicle->characteristics}</p>
			</div>
		</div>
	</div>
</div>
{/block}