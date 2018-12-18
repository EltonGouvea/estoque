<?php require_once 'includes/header.php'; ?>

<div class="content-wrapper">
<br>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="background: #3e454c; color: white">
				<i class="glyphicon glyphicon-check"></i>	Relatório de Pedido
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/getOrderReport.php" method="post" id="getOrderReportForm">
				  <div class="form-group">
				    <label for="startDate">Data Inicio</label><br>
				    <div class="">
				      <input type="text" class="form-control" id="startDate" name="startDate"  />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate">Data Final</label><br>
				    <div class="">
				      <input type="text" class="form-control" id="endDate" name="endDate"  />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="div-btn" style=>
				      <button type="submit" class="btn btn-success btn-lg" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Gerar Relatório</button>
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>
<!-- /row -->



<?php require_once 'includes/footer.php'; ?>
<script src="custom/js/report.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</div>
</main>
</body>
</html>