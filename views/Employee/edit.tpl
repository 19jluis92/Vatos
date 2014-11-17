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
				<form action="index.php?controller=user&view=delete&id={$user->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete
				</a>

			</li>
			<li><a href="index.php?controller=user">List Bump
			</a>
		</li>
		
	</ul>
	
</div>
<div class="bump form large-10 medium-9 columns">
	<form method="post" accept-charset="utf-8" action="index.php?controller=user&view=edit&id={$user->id}">
		<fieldset>
			<legend>Edit User</legend>
			<label for="idpiece">Id user</label>
			<input type="number" name="id" required="required" id="id" value="{$user->id}">
		</div>
		<div class="input number required">
			<label for="email">Email</label>
			<input type="text" name="email" required="required" id="email" value="{$user->email}">
		</div>
		<div class="input number required">
			<label for="password">password</label>
			<input type="password" name="password" required="required" id="password" value="{$user->password}">
		</div>	
	</fieldset>
	<button type="submit">Submit
	</button>
</form>
</div>

</div>
{/block}