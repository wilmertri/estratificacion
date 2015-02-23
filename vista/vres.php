		<div class="container-fluid">	
			<h1 class='page-header'>Resoluciones</h1>
			<div class="row">
				<div class="col-lg-4">
					<div class="dropdown" style="position:relative">
						<a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Año de resolución <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="home.php?var=155&res=1">Año 2012</a></li>
							<li><a href="home.php?var=155&res=2">Año 2013</a></li>
							<li><a href="home.php?var=155&res=3">Año 2014</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-8">
					<?php  
						$res = isset($_GET["res"]) ? $_GET["res"]:NULL;
						if (is_null($res)) 
						{
					?>
						<div>
							<label for="Resoluciones" class="left"><span class="glyphicon glyphicon-arrow-left"></span><strong> Seleccione el año para ver las resoluciones</strong></label>
						</div>
					<?php		
						}
						if ($res==1) 
						{
					?>
						<label for="Año 2012" class="margen">Resoluciones 2012</label>
						<br>
						<a href="normas/Res2662_21_11_12.pdf" class="button button-3d-primary button-rounded" target="_blank">Resolución 2662 de 21/11/2012</a>	
					<?php
						}
						if ($res==2) 
						{
					?>
						<label for="Año 2013" class="margen">Resoluciones 2013</label>
						<br><br>
						<a href="normas/Res404_26_02_13.pdf" class="button button-3d-primary button-rounded" target="_blank">Resolución 404 de 26/02/2013</a>
						<br><br>
						<a href="normas/Res405_26_02_13.pdf" class="button button-3d-primary button-rounded" target="_blank">Resolución 405 de 26/02/2013</a>
						<br><br>
						<a href="normas/Res406_26_02_13.pdf" class="button button-3d-primary button-rounded" target="_blank">Resolución 406 de 26/02/2013</a>
						<br><br>
						<a href="normas/Res1617_27_05_13.pdf" class="button button-3d-primary button-rounded" target="_blank">Resolución 1617 de 27/05/2013</a>
						<br><br>
						<a href="normas/Res1817_27_05_13.pdf" class="button button-3d-primary button-rounded" target="_blank">Resolución 1817 de 27/05/2013</a>	
					<?php 
						}
						if ($res==3) 
						{
					?>
						<label for="Año 2013" class="margen">Resoluciones 2014</label>
						<br><br>
						<a href="normas/Res1507_25_04_14.pdf" class="button button-3d-primary button-rounded" target="_blank">Resolución 1507 de 25/04/2014</a>
						<br><br>
						<a href="normas/Res1508_25_04_14.pdf" class="button button-3d-primary button-rounded" target="_blank">Resolución 1508 de 25/04/2014</a>
						<br><br>
						<a href="normas/Res1564_02_05_14.pdf" class="button button-3d-primary button-rounded" target="_blank">Resolución 1564 de 02/05/2014</a>
						<br><br>
						<a href="normas/Res1603_12_05_14.pdf" class="button button-3d-primary button-rounded" target="_blank">Resolución 1603 de 12/05/2014</a>
					<?php
						} 
					?>
				</div>	
			</div>
			<hr>
			<div class="row">
				
			</div>
		</div>	