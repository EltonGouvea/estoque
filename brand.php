<?php require_once 'includes/header.php'; ?>

<div class="content-wrapper">
	<br>
	<br>

	<div class="row">
		<div class="col-md-12">


			<div class="panel panel-default">
				<div class="panel-heading" style=" background: #3e454c; color: white">
					<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Gerenciar Marcas</div>
				</div> <!-- /panel-heading -->
				<div class="panel-body">

					<div class="remove-messages"></div>

					<div class="div-action pull pull-right" style="padding-bottom:20px;">
						<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#addBrandModel" > <i class="glyphicon glyphicon-plus-sign"></i> Adicionar Marca </button>
					</div> <!-- /div-action -->				
					<div class="table-responsive">
					<table class="table table-striped table-hover" id="manageBrandTable">
						<thead class="thead-dark">
							<tr>							
								<th>Marca</th>
								<th>Situação</th>
								<th style="width:15%;">Opções</th>
							</tr>
						</thead>
					</table>
				</div>
					<!-- /table -->

				</div> <!-- /panel-body -->
			</div> <!-- /panel -->		
		</div> <!-- /col-md-12 -->
	</div> <!-- /row -->

	<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content" style="padding: 5px;">

				<form class="form-horizontal" id="submitBrandForm" action="php_action/createBrand.php" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Adicionar Marca</h4>
					</div>
					<div class="modal-body">

						<div id="add-brand-messages"></div>

						<div class="form-group">
							<label for="brandName">Nome: </label>
							<br>
							<div class="">
								<input type="text" class="form-control" id="brandName" placeholder="Nome da marca" name="brandName" autocomplete="off">
							</div>
						</div> <!-- /form-group-->	        	        
						<div class="form-group">
							<label for="brandStatus">Situação: </label>
							<div >
								<select class="form-control" id="brandStatus" name="brandStatus">
									<option value="">~~SELECIONAR~~</option>
									<option value="1">Ativado</option>
									<option value="2">Desativado</option>
								</select>
							</div>
						</div> <!-- /form-group-->	         	        

					</div> <!-- /modal-body -->

					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="background:#dc3545; color: white ">Fechar</button>

						<button type="submit" class="btn btn-primary btn-lg" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off" style="background:#28a745; color: white 

						">Salvar</button>
					</div>
					<!-- /modal-footer -->
				</form>
				<!-- /.form -->
			</div>
			<!-- /modal-content -->
		</div>
		<!-- /modal-dailog -->
	</div>
	<!-- / add modal -->

	<!-- edit brand -->
	<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<form class="form-horizontal" id="editBrandForm" action="php_action/editBrand.php" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-edit"></i> Editar Marca</h4>
					</div>
					<div class="modal-body">

						<div id="edit-brand-messages"></div>

						<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
							<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
							<span class="sr-only">Loading...</span>
						</div>

						<div class="edit-brand-result">
							<div class="form-group">
								<label for="editBrandName" class="col-sm-1 control-label">Nome: </label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="editBrandName" placeholder="Brand Name" name="editBrandName" autocomplete="off">
								</div>
							</div> <!-- /form-group-->	         	        
							<div class="form-group">
								<label for="editBrandStatus" class="col-sm-1 control-label">Situação: </label>
								<div class="col-sm-12">
									<select class="form-control" id="editBrandStatus" name="editBrandStatus">
										<option value="">~~SELECIONAR~~</option>
										<option value="1">Ativado</option>
										<option value="2">Desativado</option>
									</select>
								</div>
							</div> <!-- /form-group-->	
						</div>         	        
						<!-- /edit brand result -->

					</div> <!-- /modal-body -->

					<div class="modal-footer editBrandFooter">
						<button type="button" class="btn btn-default" data-dismiss="modal" style="background:#dc3545; color: white "> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>

						<button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off" style="background:#28a745; color: white"> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
					</div>
					<!-- /modal-footer -->
				</form>
				<!-- /.form -->
			</div>
			<!-- /modal-content -->
		</div>
		<!-- /modal-dailog -->
	</div>
	<!-- / add modal -->
	<!-- /edit brand -->

	<!-- remove brand -->
	<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remover Marca</h4>
				</div>
				<div class="modal-body">
					<p>Realmente deseja remover ?</p>
				</div>
				<div class="modal-footer removeBrandFooter">
					<button type="button" class="btn btn-default" style="background:#dc3545; color: white" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Não</button>
					<button type="button" class="btn btn-primary" id="removeBrandBtn" data-loading-text="Loading..." style="background:#28a745; color: white"> <i class="glyphicon glyphicon-ok-sign"></i> Sim</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove brand -->



	<?php require_once 'includes/footer.php'; ?>
	<script src="custom/js/brand.js"></script>
	<script src="js/jquery.menu-aim.js"></script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
</div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->

</body>
</html>
