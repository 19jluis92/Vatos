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
				<a href="index.php?controller=Color&view=edit&id={$color->id}">Edit Color</a>
			</li>
			<li>
				<form action="index.php?controller=Color&view=delete&id={$color->id}" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_color.submit(); } event.returnValue = false; return false;">Delete Color</a> 
			</li>
			<li>
			<a href="index.php?controller=Color">List Color</a> 
			</li>
			<li>
			<a href="index.php?controller=Color&view=create">New Color</a>
			</li>
		</ul>
	</div>
	<div class="color view large-10 medium-9 columns">
		<h2>{$color->name}</h2>
		<div class="row">
			<div class="large-5 columns strings">
				<h6 class="subheader">Name</h6>
				<p>{$color->name}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Id</h6>
				<p>{$color->id}</p>
			</div>
		</div>
	</div>
</div>
{/block}