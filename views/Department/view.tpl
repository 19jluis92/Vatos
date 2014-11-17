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
				<a href="index.php?controller=Department&view=edit&id={$department->id}">Edit Department</a>
			</li>
			<li>
				<form action="index.php?controller=Department&view=delete&id={$department->id}" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_department.submit(); } event.returnValue = false; return false;">Delete Department</a> 
			</li>
			<li>
			<a href="index.php?controller=Department">List Department</a> 
			</li>
			<li>
			<a href="index.php?controller=Department&view=create">New Department</a>
			</li>
		</ul>
	</div>
	<div class="department view large-10 medium-9 columns">
		<h2>{$department->name}</h2>
		<div class="row">
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Id</h6>
				<p>{$department->id}</p>
			</div>
			<div class="large-5 columns strings">
				<h6 class="subheader">Name</h6>
				<p>{$department->name}</p>
			</div>
			
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Id</h6>
				<p>{$department->idLocation}</p>
			</div>
		</div>
	</div>
</div>
{/block}