<div class="col-lg-12">

	<div class="col-md-12"> 
		<center><h4 class="title-list-cro"> {ACAO} </h4></center>
	</div>	

</div>

<div class="col-lg-12">

	{BLC_DADOS}

	<div class="col-md-12 block-cursos-list">

		<div class="list-cursos-cro">

			<ul class="content-cursos">

				<li>

					<a href="{URLVIDEOAULA}">  

						<div class="col-md-8 col-sm-6 col-xs-12">
							<p>({i}) - {nomecurso}</p>
						</div>

						<div class="col-md-4 col-sm-6 col-xs-12">
							<i> Adquirido em: <span> {datahoracompra} </span> </i>
							</div>	

						</a>

						<div class="col-sm-12">
							<a href="{URLVIDEOAULA}" style="color: #fff;"><button class="btn">Continuar assistindo <i class="fa fa-play" aria-hidden="true"></i></button> </a>
						</div>	

					</li>					

				</ul>

			</div>

		</div>

		{/BLC_DADOS}



		{BLC_SEMDADOS}

		<div class="col-md-12">

			<li> Náo possui cursos ainda</li>

		</div>

		{/BLC_SEMDADOS}


	</div>

	<div class="col-lg-12">

		<div class="col-md-12">
			<nav aria-label="Page navigation" >
				<ul class="pagination">
					<li class="{HABANTERIOR}"><a aria-label="Previous" href="{URLANTERIOR}"><span aria-hidden="true">&laquo;</span></a> {BLC_PAGINAS}
						<li class="{LINK}"><a href="{URLLINK}">{INDICE}</a> {/BLC_PAGINAS}
							<li class="{HABPROX}"><a aria-label="Next" href="{URLPROXIMO}"><span aria-hidden="true">&raquo;</span></a>
							</ul>
						</nav>
					</div>
				</div>


				<style type="text/css">

					.block-cursos-list{
						padding: 50px 15px;
						background: rgba(235, 235, 235, 0.37);
						margin-bottom: 20px;
					}

					.title-list-cro{
						font-size: 4em;
						margin-left: 0px;
						margin-bottom: 50px;
						text-align: center;
						font-weight: 300;
						padding: 0px 4%;
						box-sizing: border-box;
						color: #000;
					}

					.search {
						width: 100%;
						position: relative
					}

					.searchTerm {
						float: left;
						width: 100%;
						border: 3px solid #35b4a6;
						padding: 5px;
						height: 36px;
						border-radius: 5px;
						outline: none;
						font-family: 'Raleway',sans-serif;
						color: #9DBFAF;
					}

					.searchTerm:focus{
						color: #000;
					}

					.searchButton {
						position: absolute;  
						right: -30px;
						width: 40px;
						height: 36px;
						border: 1px solid #35b4a6;
						background: #35b4a6;
						text-align: center;
						color: #fff;
						border-radius: 5px;
						cursor: pointer;
						font-size: 20px;
					}

					/*Resize the wrap to see the search bar change!*/
					.content-search{
						width: 70%;
						position: relative;
						top: 20px;
						right: 20px;

					}

					.content-cursos li a{

						margin-bottom: 80px;
						font-size: 1.3em;
						font-family: 'Raleway',sans-serif;


					}

					.content-cursos li a button {
						background: #9f2c97;

					}
				</style>