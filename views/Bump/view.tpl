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
			<a href="index.php?controller=Bump&view=edit&id={$bump->id}">Edit Bump</a> </li>
			<li>
				<form action="index.php?controller=Bump&view=delete&id={$bump->id}" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_bump.submit(); } event.returnValue = false; return false;">Delete Bump</a> 
			</li>
			<li><a href="index.php?controller=Bump">List Bump</a> </li>
			<li><a href="index.php?controller=Bump&view=create">New Bump</a> </li>
		</ul>
	</div>
	<div class="bump view large-10 medium-9 columns">
		<h2>{$bump->id}</h2>
		<div class="row">
			<div class="large-5 columns strings">
				<h6 class="subheader">Id</h6>
				<p>{$bump->id}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">idInspection</h6>
				<p>{$bump->idInspection}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">idPiece</h6>
				<p>{$bump->idPiece}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">idSeverity</h6>
				<p>{$bump->idSeverity}</p>
			</div>

		</div>
	</div>
</div>
{/block}