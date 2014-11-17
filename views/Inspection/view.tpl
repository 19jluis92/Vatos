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
				<a href="index.php?controller=CarType&view=edit&id={$carType->id}">Edit CarType</a>
			</li>
			<li>
				<form action="index.php?controller=CarType&view=delete&id={$carType->id}" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_carType.submit(); } event.returnValue = false; return false;">Delete CarType</a> 
			</li>
			<li>
			<a href="index.php?controller=CarType">List CarType</a> 
			</li>
			<li>
			<a href="index.php?controller=CarType&view=create">New CarType</a>
			</li>
		</ul>
	</div>
	<div class="carType view large-10 medium-9 columns">
		<h2>{$carType->name}</h2>
		<div class="row">
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Id</h6>
				<p>{$carType->id}</p>
			</div>
			<div class="large-5 columns strings">
				<h6 class="subheader">idService</h6>
				<p>{$carType->idService}</p>
			</div>
			<div class="large-5 columns strings">
				<h6 class="subheader">mileage</h6>
				<p>{$carType->mileage}</p>
			</div>
			<div class="large-5 columns strings">
				<h6 class="subheader">fuel</h6>
				<p>{$carType->fuel}</p>
			</div>
			<div class="large-5 columns strings">
				<h6 class="subheader">inspectionDate</h6>
				<p>{$carType->inspectionDate}</p>
			</div>
			<div class="large-5 columns strings">
				<h6 class="subheader">type</h6>
				<p>{$carType->type}</p>
			</div>
		</div>
	</div>
</div>
{/block}