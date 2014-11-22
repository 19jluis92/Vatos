{extends file="../_Layouts/master.tpl"}
{block name=title}Inventario{/block}
{block name=head}
{/block}
{block name=body}

<div>
	<label>Cliente</label>
	<select id="idcliente"class="form-control">

    <option value=''>-- none --</option>  
    </select>
</div>	
<div>
	<label>Vehicle</label>
	<select id="idvehicle"class="form-control">
    <option value=''>-- none --</option> 
    </select>
</div>

{/block}