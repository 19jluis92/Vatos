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
				<form action="index.php?controller=employee&view=delete&id={$user->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete
				</a>

			</li>
			<li><a href="index.php?controller=employee">List Bump
			</a>
		</li>
		
	</ul>
	
</div>
<div class="bump form large-10 medium-9 columns">
	<form method="post" accept-charset="utf-8" action="index.php?controller=employee&view=edit&id={$user->id}">
		<fieldset>

			<legend>Edit employee</legend>
		<div class="input number required">
					<label for="id">Id User</label>
					<input type="number" name="id" required="required" id="id">
				</div>
				<div class="input number required">
					<label for="name">Name</label>
					<input type="text" name="Name" required="required" id="Name">
				</div>
				<div class="input number required">
					<label for="lastName">Last Name</label>
					<input type="text" name="lastName" required="required" id="lastName">
				</div>
				<div class="input number required">
					<label for="idCity">Id City</label>
					<input type="number" name="idCity" required="required" id="idCity">
				</div>
				<div class="input number required">
					<label for="address">address</label>
					<input type="text" name="address" required="required" id="address">
				</div>
				<div class="input number required">
					<label for="phone">phone</label>
					<input type="phone" name="phone" required="required" id="phone">
				</div>
				<div class="input number required">
					<label for="cellphone">Cell phone</label>
					<input type="phone" name="cellphone" required="required" id="cellphone">
				</div>
				<div class="input number required">
					<label for="idUser">idUser</label>
					<input type="number" name="idUser" required="required" id="idUser">
				</div>
				<div class="input number required">
					<label for="idCarWorkShop">idCarWorkShop</label>
					<input type="number" name="idCarWorkShop" required="required" id="idCarWorkShop">
				</div>	
	</fieldset>
	<button type="submit">Submit
	</button>
</form>
</div>

</div>
{/block}