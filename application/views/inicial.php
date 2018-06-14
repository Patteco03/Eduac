<div class="grid">
	<div class="col-md-2">
		<div class="departamento">
			{BLC_DEPARTAMENTOS}
			<h4>
				<a href="{URLDEPARTAMENTO}" title="{NOMEDEPARTAMENTO}">{NOMEDEPARTAMENTO}</a>
			</h4>
			<ul class="nav nav-tabs nav-stacked">
				{BLC_DEPARTAMENTOSFILHOS}
				<li><a href="{URLDEPARTAMENTO_FILHO}"
					title="{NOMEDEPARTAMENTO_FILHO}">{NOMEDEPARTAMENTO_FILHO}</a></li>
				{/BLC_DEPARTAMENTOSFILHOS}
			</ul>
			{/BLC_DEPARTAMENTOS}
		</div>
	</div>
	
	<div class="col-md-12">
		{BLC_ORDENACAO}
		<div class="row-fluid">
			<div class="col-md-6">Exibindo {ITENSEXIBICAO} de {TOTALITENS}
				produtos</div>
			<div class="col-md-6">
				Ordenar por: <a href="{URLATUAL}&oc=nome&to=asc">De A-Z</a> | <a
					href="{URLATUAL}&oc=nome&to=desc">De Z-A</a> | <a
					href="{URLATUAL}&oc=valor&to=asc">Menor Preço</a> | <a
					href="{URLATUAL}&oc=valor&to=desc">Maior Preço</a>
			</div>
		</div>
		<hr>
		{/BLC_ORDENACAO} {LISTAGEM} {BLC_PAGINACAO}
		<hr>


		<nav aria-label="Page navigation">
			<ul class="pagination">
				{BLC_PAGINA}
				<li class="{LINK}"><a href="{URLLINK}">{INDICE}</a> {/BLC_PAGINA}
			
			</ul>
		</nav>
		{/BLC_PAGINACAO}
	</div>
	
	
</div>