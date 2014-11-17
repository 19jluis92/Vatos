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
				<form action="index.php?controller=Severity&view=delete&id={$severity->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete
				</a>
			</li>
			<li><a href="index.php?controller=Severity">List Severity</a></li>
		</ul>
	</div>
	<div class="severity form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Severity&view=edit&id={$severity->id}">
			<fieldset>
				<legend>Edit Severity</legend>
				<div class="input text required"><label for="name">Name</label><input type="text" name="name" required="required" maxlength="45" id="name" value="{$severity->name}"></div>
			</fieldset>
			<button type="submit">Submit</button>
		</form>
	</div>
</div>
{/block}