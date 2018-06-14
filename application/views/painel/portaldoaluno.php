<!-- page content -->
<div class="">
	<div class="x_panel">
		<div class="page-title">
			<div class="title_left">
				<h3>Olá Professor {NOMEPROFESSOR}</h3>
				<br> <small></small>
			</div>
		</div>
	</div>


	<div class="x_panel">
		<div class="col-md-12">

			<div class="row">
				<div class="col-sm-3 col-xs-6">
					<center>
						<figure class="float" id="modelcursos">
							<a href="#meuscursos"> <img
								src="<?php echo base_url('assets/img/books-stack.png') ?>"
								title="Financeiro" class="img-responsive" width="64" height="64">
							</a>
							<figcaption>Minhas Aulas</figcaption>
						</figure>
					</center>
				</div>

				<div class="col-sm-3 col-xs-6">
					<center>
						<figure class="float" id="modelmateriais">
							<a href="#materiais"> <img
								src="<?php echo base_url('assets/img/document.png') ?>"
								title="Financeiro" class="img-responsive" width="64" height="64">
							</a>
							<figcaption>Cursos e Materiais</figcaption>
						</figure>
					</center>
				</div>

				<div class="col-sm-3 col-xs-6">
					<center>
						<figure class="float" id="modalplanoensino">
							<a href="#planoensino"> <img
								src="<?php echo base_url('assets/img/classroom.png') ?>"
								title="Financeiro" class="img-responsive" width="64" height="64">
							</a>
							<figcaption>Plano de Ensino</figcaption>
						</figure>
					</center>
				</div>

				<div class="col-sm-3 col-xs-6">
					<center>
						<figure class="float" id="modalacompanhamento">
							<a href="#acompanhamento"> <img
								src="<?php echo base_url('assets/img/student.png') ?>"
								title="Financeiro" class="img-responsive" width="64" height="64">
							</a>
							<figcaption>Acom.Atividades</figcaption>
						</figure>
					</center>
				</div>
			</div>

		</div>
	</div>

	<div class="x_panel" id="panelportal">
		<div class="col-md-12">
			<div class="conteudo-portal">

				<div class="meuscursos" id="meuscursos">



				</div>

				<div class="materiais" id="materiais">
					
										<div class="table-responsive">
						<table id="datatable-responsive"
							class="table table-striped table-bordered bulk_action">
							<thead>
								<td>Código</td>
								<td>Curso</td>
								<td>Data Inicio</td>
								<td>Data Final</td>
								<td>Duracão</td>
								<td>Tipo</td>
							</thead>
							<tbody>
								{BLC_DADOS}
								<tr>
									<td>{CODPRODUTO}</td>
									<td><a href="{URLPRODUTO}">  <img src="{URLFOTO}" title="{NOMEPRODUTO}" alt="foto miniatura curso" width="30" height="20" style="margin-right: 15px;">  {NOMEPRODUTO} </a></td>
									<td>{DATAINICIO}</td>
									<td>{DATAFINAL}</td>
									<td>{DURACAO} meses</td>
									<td>{TIPOCURSO}</td>
									
								</tr>
								{/BLC_DADOS} {BLC_SEMDADOS}
								<tr>
									<td colspan="6" class="alinha-centro">Não há cursos ainda</td>
								</tr>
								{/BLC_SEMDADOS}
							</tbody>
						</table>
					</div>
				
				</div>

				<div class="planoensino" id="planoensino">Plano de Ensino</div>

				<div class="acompanhamento" id="acompanhamento">
									<div class="materiais" id="materiais">
					
										<div class="table-responsive">
						<table id="datatable-responsive"
							class="table table-striped table-bordered bulk_action">
							<thead>
								<td>Código</td>
								<td>Curso</td>
								<td>Data Inicio</td>
								<td>Data Final</td>
								<td>Duracão</td>
								<td>Tipo</td>
							</thead>
							<tbody>
								{BLC_DADOS}
								<tr>
									<td>{CODPRODUTO}</td>
									<td><a href="{URLPRODUTO}">  <img src="{URLFOTO}" title="{NOMEPRODUTO}" alt="foto miniatura curso" width="30" height="20" style="margin-right: 15px;">  {NOMEPRODUTO} </a></td>
									<td>{DATAINICIO}</td>
									<td>{DATAFINAL}</td>
									<td>{DURACAO} meses</td>
									<td>{TIPOCURSO}</td>
									
								</tr>
								{/BLC_DADOS} {BLC_SEMDADOS}
								<tr>
									<td colspan="6" class="alinha-centro">Não há cursos ainda</td>
								</tr>
								{/BLC_SEMDADOS}
							</tbody>
						</table>
					</div>
				
				</div>	

				</div>


				<center>
					<div class="loader" id="loading"></div>
				</center>

			</div>
		</div>
	</div>



</div>






