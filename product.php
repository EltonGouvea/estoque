<?php require_once 'php_action/db_connect.php' ?>
<?php include 'includes/header.php'; ?>
<style type="text/css">
	.btn-default{
		background:#dc3545; 
		color: white;
	}
	.btn-sucess,.btn-primary,.button1{
		background:#28a745; 
		color: white;
	}
	.panel-heading{
		background: #3e454c; 
		color: white
	}
</style>

<div class="content-wrapper">
<br>
<br>

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default">
			<div class="panel-heading" style="background: #3e454c; color: white">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Gerenciar Produtos</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-success btn-lg" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal" style="background:#28a745; color: white"> <i class="glyphicon glyphicon-plus-sign"></i> Adicionar Produto </button>
				</div> <!-- /div-action -->				
				<div class="table-responsive">
				<table class="table table-striped table-hover" id="manageProductTable">
					<thead class="thead-dark">
						<tr>
							<th style="width:10%;">Foto</th>							
							<th>Produto</th>
							<th>Preço</th>							
							<th>Quantidade</th>
							<th>Marca</th>
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


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Adicionar Produto</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	      	<div class="form-group">
	        	<label for="productImage">Imagem do Produto: </label><br>
				    <div>
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="" name="productImage" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
	        </div> <!-- /form-group-->	     	           	       

	        <div class="form-group">
	        	<label for="productName">Nome do Produto: </label><br>
	        	
				    <div>
				      <input type="text" class="form-control" id="productName" placeholder="" name="productName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="quantity">Quantidade: </label><br>
	        	
				    <div>
				      <input type="text" class="form-control" id="quantity" placeholder="" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="rate" >Preço: </label><br>
	        
				    <div >
				      <input type="text" class="form-control" id="rate" placeholder="" name="rate" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	     	        

	        <div class="form-group">
	        	<label for="brandName" >Marca: </label><br>
	        	
				    <div>
				      <select class="form-control" id="brandName" name="brandName">
				      	<option value="">~~SELECIONAR~~</option>
				      	<?php 
				      	$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1 AND brand_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="categoryName">Categoria: </label><br>
				    <div>
				      <select type="text" class="form-control" id="categoryName" placeholder="" name="categoryName" >
				      	<option value="">~~SELECIONAR~~</option>
				      	<?php 
				      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->					        	         	       

	        <div class="form-group">
	        	<label for="productStatus">Situação: </label><br>
				    <div>
				      <select class="form-control" id="productStatus" name="productStatus">
				      	<option value="">~~SELECIONAR~~</option>
				      	<option value="1">Ativado</option>
				      	<option value="2">Desativado</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
	        
	        <button type="submit" class="btn btn-success btn-lg" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Produto</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab" data-toggle="tab">Foto</a></li>
				    <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab">Informações do Produto</a></li>    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	
				    <div role="tabpanel" class="tab-pane active" id="photo">
				    	<form action="php_action/editProductImage.php" method="POST" id="updateProductImageForm" class="form-horizontal" enctype="multipart/form-data">

				    	<br />
				    	<div id="edit-productPhoto-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-1 control-label">Imagem: </label>
						    <div class="col-sm-12">							    				   
						      <img src="" id="getProductImage" class="thumbnail" style="width:250px; height:250px;" />
						    </div>
			        </div> <!-- /form-group-->	     	           	       
				    	
			      	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-1 control-label">Foto: </label>
						    <div class="col-sm-12">
							    <!-- the avatar markup -->
									<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
							    <div class="kv-avatar center-block">					        
							        <input type="file" class="form-control" id="editProductImage" placeholder="" name="editProductImage" class="file-loading" style="width:50%;"/>
							    </div>
						      
						    </div>
			        </div> <!-- /form-group-->	     	           	       
			        <br>
			        <div class="modal-footer editProductPhotoFooter">
				        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> fechar</button>
				        
				        <!-- <button type="submit" class="btn btn-success" id="editProductImageBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button> -->
				      </div>
				      <!-- /modal-footer -->
				      </form>
				      <!-- /form -->
				    </div>
				    <!-- product image -->
				    <div role="tabpanel" class="tab-pane" id="productInfo">
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php" method="POST">				    
				    	<br />

				    	<div id="edit-product-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductName" class="col-sm-1 control-label">Nome: </label>

						    <div class="col-sm-12">
						      <input type="text" class="form-control" id="editProductName" placeholder="" name="editProductName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	    

			        <div class="form-group">
			        	<label for="editQuantity" class="col-sm-1 control-label">Quantidade: </label>

						    <div class="col-sm-12">
						      <input type="text" class="form-control" id="editQuantity" placeholder="" name="editQuantity" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	        	 

			        <div class="form-group">
			        	<label for="editRate" class="col-sm-1 control-label">Preço: </label>

						    <div class="col-sm-12">
						      <input type="text" class="form-control" id="editRate" placeholder="" name="editRate" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	     	        

			        <div class="form-group">
			        	<label for="editBrandName" class="col-sm-1 control-label">Marca: </label>

						    <div class="col-sm-12">
						      <select class="form-control" id="editBrandName" name="editBrandName">
						      	<option value="">~~SELECIONAR~~</option>
						      	<?php 
						      	$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1 AND brand_active = 1";
										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	

			        <div class="form-group">
			        	<label for="editCategoryName" class="col-sm-1 control-label">Categoria: </label>

						    <div class="col-sm-12">
						      <select type="text" class="form-control" id="editCategoryName" name="editCategoryName" >
						      	<option value="">~~SELECIONAR~~</option>
						      	<?php 
						      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->					        	         	       

			        <div class="form-group">
			        	<label for="editProductStatus" class="col-sm-3 control-label">Situação: </label>

						    <div class="col-sm-12">
						      <select class="form-control" id="editProductStatus" name="editProductStatus">
						      	<option value="">~~SELECIONAR~~</option>
						      	<option value="1">Ativado</option>
						      	<option value="2">Desativado</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	         	        

			        <div class="modal-footer editProductFooter">
				        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
				        
				        <button type="submit" class="btn btn-success btn-lg" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remover Produto</h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p>Deseja Realmente Remover ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Não</button>
        <button type="button" class="btn btn-success btn-lg" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Sim</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->

<?php require_once 'includes/footer.php'; ?>
<script src="custom/js/product.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</div> <!-- .content-wrapper -->

</main> <!-- .cd-main-content -->

</body>
</html>