{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Brand&view=edit&id={$brand->id}">Edit Brand</a> </li>
			<li><form action="index.php?controller=Brand&view=delete&id={$brand->id}" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form><a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_brand.submit(); } event.returnValue = false; return false;">Delete Brand</a> </li>
			<li><a href="index.php?controller=Brand">List Brand</a> </li>
			<li><a href="index.php?controller=Brand&view=create">New Brand</a> </li>
		</ul>
	</div>
	<div class="brand view large-10 medium-9 columns">
		<h2>{$brand->name}</h2>
		<div class="row">
			<div class="large-5 columns strings">
				<h6 class="subheader">Name</h6>
				<p>{$brand->name}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Id</h6>
				<p>{$brand->id}</p>
			</div>
		</div>
	</div>
</div>
{/block}