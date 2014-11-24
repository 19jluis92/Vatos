{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li>
				<a class="list-group-item" href="index.php?controller=Department&view=edit&id={$department->id}">Editar Departmento</a>
			</li>
			<li>
				<form action="index.php?controller=Department&view=delete&id={$department->id}" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form>
				<a class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_department.submit(); } event.returnValue = false; return false;">Eliminar Departmento</a> 
			</li>
			<li>
			<a class="list-group-item" href="index.php?controller=Department">Listar Departmentos</a> 
			</li>
			<li>
			<a class="list-group-item" href="index.php?controller=Department&view=create">Nuevo Departmento</a>
			</li>
		</ul>
	</div>
	<div class="col-md-10">
		<h2>{$department->id}</h2>
		<div class="row">
			<div class="col-md-4">
				<h6 class="subheader">Id</h6>
				<p>{$department->id}</p>
			</div>
			<div class="col-md-4">
				<h6 class="subheader">Name</h6>
				<p>{$department->name}</p>
			</div>
			
			<div class="col-md-4">
				<h6 class="subheader">Id</h6>
				<p>{$department->idLocation}</p>
			</div>
		</div>
	</div>
</div>
{/block}