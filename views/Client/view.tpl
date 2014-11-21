{extends file="../_Layouts/master.tpl"}
{block name=title}Client{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Acciones</h3>
		<ul class="side-nav">
			<<li>
				<a href="index.php?controller=client&view=edit&id={$client->id}">Edit client</a>
			</li>
			<li>
				<form action="index.php?controller=client&view=delete&id={$client->id}" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_client.submit(); } event.returnValue = false; return false;">Borrar Cliente</a> 
			</li>
			<li><a href="index.php?controller=client">Listar Clientes</a> </li>
			<li><a href="index.php?controller=client&view=create">Nuevo Cliente</a> </li>
		</ul>
	</div>
	<div class="bump view large-10 medium-9 columns">
		<h2>{$client->id}</h2>
		<div class="row">
			<div class="large-5 columns strings">
				<h6 class="subheader">Id</h6>
				<p>{$client->id}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Nombre</h6>
				<p>{$client->name}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Apellido</h6>
				<p>{$client->lastName}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">RFC</h6>
				<p>{$client->rfc}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Email</h6>
				<p>{$client->email}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Direccion</h6>
				<p>{$client->address}</p>
			</div>
		</div>
	</div>
</div>
{/block}