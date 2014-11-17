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
			<a href="index.php?controller=Country&view=edit&id={$user->id}">Edit Country</a> </li>
			<li>
				<form action="index.php?controller=Country&view=delete&id={$user->id}" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_Country.submit(); } event.returnValue = false; return false;">Delete Country</a> 
			</li>
			<li><a href="index.php?controller=Country">List Country</a> </li>
			<li><a href="index.php?controller=Country&view=create">New Country</a> </li>
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
			
			

		</div>
	</div>
</div>
{/block}