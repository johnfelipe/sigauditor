<section class="container sombra">
	
	<div class="panel panel-primary">
		<div class="panel-heading">
	        <span class="glyphicon glyphicon-search"></span> <strong>Alertas</strong>
	        <a href="#" onclick="javascript:volver();">
	        	<span class='pull-right label label-danger'><h5><i class="glyphicon glyphicon-chevron-left"></i><strong>Volver</strong></h5></span>
	        </a>
	    </div>
	<div class="panel-body">
	  
 
  
		
	<div class="row">
		<div class="col-lg-9">
			<p><strong>Este módulo le brinda la posibilidad de encontrar las posibles alertas en la información registrada.</strong></p>
			<p>Por favor seleccione la empresa y la interventoria a verificar</p>
		</div>
		
		<div class="col-lg-3" id="logosig"><img src="<?php echo base_url(); ?>/img/logoweb.png" class="img-responsive" alt=""></div>
	</div>

	<div class="row">
		<div class="col-lg-12"> 
		<!--<form action="<?php echo base_url(); ?>index.php/con_consolidado/consolidado" name="form1" id="form1" method='post' enctype="multipart/form-data">-->
			<table class="table table-striped">
				<tr>
					<td><strong>Empresa: </strong></td>
					<td>
						<select class="form-control" id="emp_id" name="emp_id" onchange="consecutivos_alertas();" required="required">
						<option value="-1" selected="selected">Seleccione Empresa</option>
							<?php 
				    			foreach($empresas as $emp){
				       				echo "<option value='".$emp->emp_id."'>".$emp->emp_nombre."</option>";
			     				}
			     			?>
			     		</select>
			     	</td>
			     	<td><strong>Innterventoria: </strong></td>
			     	<td>
						<div id="interven">
							<select id='interventoria' name='interventoria' class='form-control' required="required">
							<option value="-1" selected="selected">Seleccione Interventoría</option>
							</select>
						</div>
					</td>
					<td>
					<button type="button" class="btn btn-fresh text-uppercase btn-sm" onclick="alertas();">
					 	Ver 
					 	<i class="glyphicon glyphicon-search"></i>
					 </button>

					 <!--<button type="button" class="btn btn-sky text-uppercase btn-sm" onclick="waitingDialog.show('Generando archivo EXCEL Por favor espere....');setTimeout(function () {waitingDialog.hide();}, 3000);">
					 	Generar Consolidado XLS
					 	<i class="glyphicon glyphicon-floppy-save"></i>
					 </button>-->
						
					</td>
				</tr>
			</table>
		<!--</form>-->
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12" id="alertas"></div>
	</div>


	</div>
	<div class="panel-footer">
		<button type="button" class="btn btn-hot text-uppercase btn-block" onclick="javascript:volver();">
			<i class="glyphicon glyphicon-chevron-left"></i>
			 Volver 
		</button>
	</div>

</section>