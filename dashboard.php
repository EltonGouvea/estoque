<?php include 'includes/header.php'; ?>

<?php 
$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = "";
while ($orderResult = $orderQuery->fetch_assoc()) {
	$totalRevenue += $orderResult['paid'];
}

$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$userwisesql = "SELECT users.username , SUM(orders.grand_total) as totalorder FROM orders INNER JOIN users ON orders.user_id = users.user_id WHERE orders.order_status = 1 GROUP BY orders.user_id";
$userwiseQuery = $connect->query($userwisesql);
$userwieseOrder = $userwiseQuery->num_rows;

$connect->close();

?>
<style type="text/css">
.card-deck{
	display: flex;
	margin:auto;
	font-size: 16px;
	font-weight: bold;
}
.card{
	max-width: 30rem;
}
.card-img-top{
	max-width: 30rem;
}
</style>

<div class="content-wrapper">
	<br>
	<br>
	<div class="row">
		<?php  if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>

			<div class="card-deck">
				
				<div class="card text-white bg-dark " >
					<div class="card-header text-center">Produtos cadastrados</div>
					<a href="product.php"><img class="card-img-top" src="img/produtos.png" alt="Card image cap"></a>
					
					<div class="card-body">
						<p class="card-text"><?php echo $countProduct; ?> produtos cadastrados</p>
					</div>
				</div>

				<div class="card text-white bg-dark" >
					<div class="card-header text-center">Estoque Baixo</div>
					<a href="product.php" ><img class="card-img-top" src="img/estoque.png" alt="Card image cap"></a>

					<div class="card-body">
						<p class="card-text"><?php echo $countLowStock; ?> produtos com baixa</p>
					</div>
				</div>
			<?php } ?> 

			<div class="card text-white bg-dark" >
				<div class="card-header text-center">Pedidos</div>
				<a href="orders.php?o=manord" ><img class="card-img-top" src="img/pedidos.png" alt="Card image cap"></a>
				
				<div class="card-body">
					<p class="card-text"><?php echo $countOrder; ?> pedidos</p>
				</div>
			</div>
			<div class="card text-white bg-success" >
				<div class="card-header text-center">Receita Total</div>
				<img class="card-img-top" src="img/receita.png" alt="Card image cap" style="min-width:80%">
				
				<div class="card-body">

					<p class="card-text">R$ <?php if($totalRevenue) {
						echo   $totalRevenue;
					} else {
						echo '0';
					} ?></p>
				</div>
			</div>
		</div>

		<br>
		<br>


	<?php  if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
		<div class="col-md-12" style="margin-top: 50px; font-size: 20px;">
			<div class="panel panel-default">
				<div class="panel-heading" style=" background:#343a40; color: white "> <i class="glyphicon glyphicon-calendar"></i> Ordem de pedido</div>
				<div class="panel-body">
					<div class="table-responsive">
					<table class="table  table-striped table-hover" id="productTable">
						<thead class="thead-dark">
							<tr>			  			
								<th style="width:40%;">Nome</th>
								<th style="width:20%;">Montante do Pedido</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($orderResult = $userwiseQuery->fetch_assoc()) { ?>
								<tr>
									<td><?php echo $orderResult['username']?></td>
									<td><?php echo $orderResult['totalorder']?></td>

								</tr>

							<?php } ?>
						</tbody>
					</table>
					</div>
					<!--<div id="calendar"></div>-->
				</div>	
			</div>

		</div> 
	<?php  } ?>

</div> <!--/row-->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function () {
			// top bar active
			$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
      	header: {
      		left: '',
      		center: 'title'
      	},
      	buttonText: {
      		today: 'today',
      		month: 'month'          
      	}        
      });


  });
</script>

<?php require_once 'includes/footer.php'; ?>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->
</body>
</html>