{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div  class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=user&view=create">Nuevo Usuario</a> </li>
			<li><a class="list-group-item" href="index.php?controller=User">Mostrar Usuarios</a></li>
			<li><a class="list-group-item" href="index.php?controller=User&view=edit&id={$user->id}">Editar Usuario</a> </li>
			<li>
				<form action="index.php?controller=User&view=delete&id={$user->id}" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a class="list-group-item" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_user.submit(); } event.returnValue = false; return false;">Borrar Usuario</a> 
				
			</li>
		</ul>
	</div>
	<div class="bump view large-10 medium-9 columns">
		<div class="row">
			<div class="large-5 columns strings">
				<h6 class="subheader">Id</h6>
				<p>{$user->id}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Email</h6>
				<p>{$user->email}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Password</h6>
				<p>{$user->password}</p>
			</div>
			

		</div>
	</div>
</div>
{/block}