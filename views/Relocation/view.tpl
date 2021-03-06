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
			<a href="index.php?controller=Relocation&view=edit&id={$user->id}">Edit Relocation</a> </li>
			<li>
				<form action="index.php?controller=Relocation&view=delete&id={$user->id}" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_State.submit(); } event.returnValue = false; return false;">Delete Relocation</a> 
			</li>
			<li><a href="index.php?controller=Relocation">List Relocation</a> </li>
			<li><a href="index.php?controller=Relocation&view=create">New Relocation</a> </li>
		</ul>
	</div>
	<div class="bump view large-10 medium-9 columns">
		<h2>{$user->id}</h2>
		<div class="row">
			<div class="large-5 columns strings">
				<h6 class="subheader">Id</h6>
				<p>{$user->id}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Name</h6>
				<p>{$user->name}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">idState</h6>
				<p>{$user->idState}</p>
			</div>
			<div class="large-5 columns strings">
				<h6 class="subheader">reason</h6>
				<p>{$user->reason}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">idDepartment</h6>
				<p>{$user->idDepartment}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">idService</h6>
				<p>{$user->idService}</p>
			</div>

		</div>
	</div>
</div>
{/block}