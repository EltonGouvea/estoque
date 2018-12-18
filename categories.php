<?php require_once 'includes/header.php'; ?>
<style>
main{
	font-weight:20px;
}
</style>
<div class="content-wrapper">
	<br>
	<br>

	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default" >
				<div class="panel-heading" style="background: #3e454c; color: white" >
					<div class="page-heading" > <i class="glyphicon glyphicon-edit"></i> Gerenciar Categorias</div>
				</div> <!-- /panel-heading -->
				<div class="panel-body">

					<div class="remove-messages"></div>

					<div class="div-action pull pull-right" style="padding-bottom:20px;">
						<button class="btn btn-success btn-lg" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal" style="background:#28a745; color: white "> <i class="glyphicon glyphicon-plus-sign"></i> Adicionar Categorias </button>
					</div> <!-- /div-action -->				
					<div class="table-responsive">
						<table class="table  table-striped table-hover" id="manageCategoriesTable">
							<thead class="thead-dark">
								<tr>							
									<th>Categoria</th>
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



	<!-- Modal -->
	<div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form class="form-horizontal" id="submitCategoriesForm" action="php_action/createCategories.php" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Adicionar Categoria</h4>
					</div>
					<div class="modal-body">
						<div id="add-categories-messages"></div>

						<div class="form-group">
							<label for="categoriesName">Nome da Categoria: </label>
							<br>
							<div >
								<input type="text" class="form-control" id="categoriesName" placeholder="Nome da Categoria" name="categoriesName" autocomplete="off">
							</div>
						</div> <!-- /form-group-->	         	        
						<div class="form-group">
							<label for="categoriesStatus" >Situação: </label>
							<br>
							<div>
								<select class="form-control" id="categoriesStatus" name="categoriesStatus">
									<option value="">~~SELECIONAR~~</option>
									<option value="1">Ativado</option>
									<option value="2">Desativado</option>
								</select>
							</div>
						</div> <!-- /form-group-->	         	        
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>

						<button type="submit" class="btn btn-primary" id="createCategoriesBtn" data-loading-text="Loading..." autocomplete="off" style="background:#28a745; color: white" > <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- edit categories brand -->
	<div class="modal fade" id="editCategoriesModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<form class="form-horizontal" id="editCategoriesForm" action="php_action/editCategories.php" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-edit"></i> Editar Categoria</h4>
					</div>
					<div class="modal-body">

						<div id="edit-categories-messages"></div>

						<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
							<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
							<span class="sr-only">Loading...</span>
						</div>

						<div class="edit-categories-result">
							<div class="form-group">
								<label for="editCategoriesName" class="col-sm-1 control-label">Nome:</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="editCategoriesName" placeholder="Categories Name" name="editCategoriesName" autocomplete="off">
								</div>
							</div> <!-- /form-group-->	         	        
							<div class="form-group">
								<label for="editCategoriesStatus" class="col-sm-1 control-label">Situação: </label>
								<div class="col-sm-12">
									<select class="form-control" id="editCategoriesStatus" name="editCategoriesStatus">
										<option value="">~~SELECIONAR~~</option>
										<option value="1">Ativado</option>
										<option value="2">Desativado</option>
									</select>
								</div>
							</div> <!-- /form-group-->	 
						</div>         	        
						<!-- /edit brand result -->

					</div> <!-- /modal-body -->

					<div class="modal-footer editCategoriesFooter">
						<button type="button" class="btn btn-default" data-dismiss="modal" style="background:#dc3545; color: white"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>

						<button type="submit" class="btn btn-success" id="editCategoriesBtn" data-loading-text="Loading..." autocomplete="off" style="background:#28a745; color: white"> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
					</div>
					<!-- /modal-footer -->
				</form>
				<!-- /.form -->
			</div>
			<!-- /modal-content -->
		</div>
		<!-- /modal-dailog -->
	</div>
	<!-- /categories brand -->

	<!-- categories brand -->
	<div class="modal fade" tabindex="-1" role="dialog" id="removeCategoriesModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remover Categoria</h4>
				</div>
				<div class="modal-body">
					<p>Deseja realmente remover ?</p>
				</div>
				<div class="modal-footer removeCategoriesFooter">
					<button type="button" class="btn btn-default" data-dismiss="modal" 
					style="background:#dc3545; color: white"> <i class="glyphicon glyphicon-remove-sign"></i> Não</button>
					<button type="button" class="btn btn-primary" id="removeCategoriesBtn" data-loading-text="Loading..." style="background:#28a745; color: white"> <i class="glyphicon glyphicon-ok-sign" ></i> Sim</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /categories brand -->


	<script src="custom/js/categories.js"></script>



	<?php require_once 'includes/footer.php'; ?>
	<script src="js/jquery.menu-aim.js"></script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
</div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->

</body>
</html>