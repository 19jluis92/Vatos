{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li>
			<a href="index.php?controller=State&view=edit&id={$state->id}">Editar Estado</a> </li>
			<li>
				<form action="index.php?controller=State&view=delete&id={$state->id}" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_State.submit(); } event.returnValue = false; return false;">Borrar Estado</a> 
			</li>
			<li><a href="index.php?controller=State">Listar Estados</a> </li>
			<li><a href="index.php?controller=State&view=create">Nuevo Estado</a> </li>
		</ul>
	</div>
	<div class="state col-md-12">
		<h2>{$state->id}</h2>
		
		<div class="row">
			<div class="col-md-4">
				<h6 class="subheader">Id</h6>
				<p>{$state->id}</p>
			</div>
			<div class="col-md-4">
				<h6 class="subheader">Name</h6>
				<p>{$state->name}</p>
			</div>
			<div class="col-md-4">
				<h6 class="subheader">IdCountry</h6>
				<p>{$state->idCountry}</p>
			</div>
		</div>
			

		
	</div>
</div>
{/block}