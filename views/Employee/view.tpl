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
			<a href="index.php?controller=employee&view=edit&id={$employee->id}">Edit Employee</a> </li>
			<li>
				<form action="index.php?controller=employee&view=delete&id={$employee->id}" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_employee.submit(); } event.returnValue = false; return false;">Delete employee</a> 
			</li>
			<li><a href="index.php?controller=employee">List employee</a> </li>
			<li><a href="index.php?controller=employee&view=create">New employee</a> </li>
		</ul>
	</div>
	<div class="bump view large-10 medium-9 columns">
		<h2>{$employee->id}</h2>
		<div class="row">
			<div class="large-5 columns strings">
				<h6 class="subheader">Id</h6>
				<p>{$employee->id}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">Name</h6>
				<p>{$employee->name}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">LastName</h6>
				<p>{$employee->lastName}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">NSS</h6>
				<p>{$employee->nss}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">idCity</h6>
				<p>{$City}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">address</h6>
				<p>{$employee->address}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">phone</h6>
				<p>{$employee->phone}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">cellphone</h6>
				<p>{$employee->cellPhone}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">idemployee</h6>
				<p>{$employees}</p>
			</div>
			<div class="large-2 larege-offset-1 columns numbers end">
				<h6 class="subheader">idCarWorkShop</h6>
				<p>{$CarWorkShop}</p>
			</div>

		</div>
	</div>
</div>
{/block}