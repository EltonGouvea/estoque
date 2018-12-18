<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="content-wrapper">
<br>
<br>
<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default">
			<div class="panel-heading " style="background: #3e454c; color: white;">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Gerenciar Usuário</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-success button1" data-toggle="modal" id="addUserModalBtn" data-target="#addUserModal"> <i class="glyphicon glyphicon-plus-sign"></i> Adicionar Usuário </button>
				</div> <!-- /div-action -->				
				<div class="table-responsive">
				<table class="table  table-striped table-hover" id="manageUserTable">
					<thead class="thead-dark">
						<tr>
							<th style="width:10%;"> Usuário</th>
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


<!-- add user -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitUserForm" action="php_action/createUser.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Adicionar Usuário</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-user-messages"></div>

	      		     	           	       

	        <div class="form-group">
	        	<label for="userName" class="col-sm-1 control-label">Nome: </label>
	        	
				    <div class="col-sm-12">
				      <input type="text" class="form-control" id="userName" placeholder="Nome de Usuário" name="userName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="upassword" class="col-sm-1 control-label">Senha: </label>
	        	
				    <div class="col-sm-12">
				      <input type="password" class="form-control" id="upassword" placeholder="Senha" name="upassword" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="uemail" class="col-sm-1 control-label">Email: </label>
	        	
				    <div class="col-sm-12">
				      <input type="email" class="form-control" id="uemail" placeholder="Email" name="uemail" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
	        	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
	        
	        <button type="submit" class="btn btn-success" id="createUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Usuário</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#userInfo" aria-controls="profile" role="tab" data-toggle="tab">Informações do Usuário</a></li>    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	
				    
				    <!-- product image -->
				    <div role="tabpanel" class="tab-pane active" id="userInfo">
				    	<form class="form-horizontal" id="editUserForm" action="php_action/editUser.php" method="POST">				    
				    	<br />

				    	<div id="edit-user-messages"></div>

				    	<div class="form-group">
			        		<label for="edituserName" class="col-sm-1 control-label">Nome: </label>
			        	
						    <div class="col-sm-12">
						      <input type="text" class="form-control" id="edituserName" placeholder="Nome de Usuário" name="edituserName" autocomplete="off">
						    </div>
			        	</div> <!-- /form-group-->	    

				        <div class="form-group">
				        	<label for="editPassword" class="col-sm-1 control-label">Senha: </label>
				        	
							    <div class="col-sm-12">
							      <input type="password" class="form-control" id="editPassword" placeholder="Senha" name="editPassword" autocomplete="off">
							    </div>
				        </div> <!-- /form-group-->	        	 

			         
         	        

			        <div class="modal-footer editUserFooter">
				        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
				        
				        <button type="submit" class="btn btn-primary btn-lg" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Salvar mudanças</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remover Usuário</h4>
      </div>
      <div class="modal-body">

      	<div class="removeUserMessages"></div>

        <p>Deseja realmente remover ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Não</button>
        <button type="button" class="btn btn-primary btn-lg" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Sim</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/user.js"></script>

<?php require_once 'includes/footer.php'; ?>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</div>
</main>
</body>
<html>