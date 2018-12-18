<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 

if($_GET['o'] == 'add') { 
// add order
	echo "<div class='div-request div-hide'>add</div>";
} else if($_GET['o'] == 'manord') { 
	echo "<div class='div-request div-hide'>manord</div>";
} else if($_GET['o'] == 'editOrd') { 
	echo "<div class='div-request div-hide'>editOrd</div>";
} // /else manage order


?>
<style type="text/css">
.col-sm-offset-2{
	margin-left: 0px;
	text-align: center;
}
</style>
<div class="content-wrapper">
	<br>
	<br>


	<div class="panel panel-default">
		<div class="panel-heading" style=" background: #3e454c; color: white; font-size: 20px;">

			<?php if($_GET['o'] == 'add') { ?>
				<i class="glyphicon glyphicon-plus-sign"></i>Adicionar Pedido
			<?php } else if($_GET['o'] == 'manord') { ?>
				<i class="glyphicon glyphicon-edit"></i> Gerenciar Pedido
			<?php } else if($_GET['o'] == 'editOrd') { ?>
				<i class="glyphicon glyphicon-edit"></i> Editar Pedido
			<?php } ?>

		</div> <!--/panel-->	
		<div class="panel-body">
			
			<?php if($_GET['o'] == 'add') { 
			// add order
				?>			

				<div class="success-messages"></div> <!--/success-messages-->

				<form class="form-horizontal" method="POST" action="php_action/createOrder.php" id="createOrderForm">

					<div class="form-group">
						<label for="orderDate" >Data</label><br>
						<div>
							<input type="text" class="form-control" id="orderDate" name="orderDate" autocomplete="off" />
						</div>
					</div> <!--/form-group-->
					<div class="form-group">
						<label for="clientName" >Cliente</label><br>
						<div>
							<input type="text" class="form-control" id="clientName" name="clientName"  autocomplete="off" />
						</div>
					</div> <!--/form-group-->
					<div class="form-group">
						<label for="clientContact">Contato</label><br>
						<div>
							<input type="text" class="form-control" id="clientContact" name="clientContact" autocomplete="off" />
						</div>
					</div> <!--/form-group-->			  
					<div class="table-responsive">
						<table class="table table-striped table-hover" id="productTable">
							<thead class="thead-dark">
								<tr>			  			
									<th style="width:30%;">Produto</th>
									<th style="width:10%;">Preço</th>
									<th style="width:15%;">Qtd. Disp.</th>
									<th style="width:15%;">Quantidade</th>			  			
									<th style="width:20%;">Total</th>			  			
									<th style="width:10%;"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$arrayNumber = 0;
								for($x = 1; $x < 4; $x++) { ?>
									<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
										<td style="margin-left:20px;">
											<div class="form-group">

												<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
													<option value="">selecionar</option>
													<?php
													$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity != 0";
													$productData = $connect->query($productSql);

													while($row = $productData->fetch_array()) {									 		
														echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."'>".$row['product_name']."</option>";
										 	} // /while 

										 	?>
										 </select>
										</div>
									</td>
									<td style="padding-left:20px;">			  					
										<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" />			  					
										<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
									</td>
									<td style="padding-left:20px;">
										<div class="form-group">
											<p id="available_quantity<?php echo $x; ?>"></p>
										</div>
									</td>
									<td style="padding-left:20px;">
										<div class="form-group">
											<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
										</div>
									</td>
									<td style="padding-left:20px;">			  					
										<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />			  					
										<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
									</td>
									<td>

										<button class="btn btn-danger btn-lg removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
									</td>
								</tr>
								<?php
								$arrayNumber++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="subTotal">Subtotal</label><br>
					<div>
						<input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" />
						<input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
					</div>
				</div> <!--/form-group-->			  
				<!--/form-group-->			  
				<div class="form-group">
					<label for="totalAmount">Valor Total</label><br>
					<div>
						<input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true"/>
						<input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
					</div>
				</div> <!--/form-group-->			  
				<div class="form-group">
					<label for="discount">Desconto</label><br>
					<div>
						<input type="text" class="form-control" id="discount" name="discount" onkeyup="discountFunc()" autocomplete="off" />
					</div>
				</div> <!--/form-group-->	
				<div class="form-group">
					<label for="grandTotal">Valor Geral</label><br>
					<div>
						<input type="text" class="form-control" id="grandTotal" name="grandTotal" disabled="true" />
						<input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" />
					</div>
				</div> <!--/form-group-->	
				<div class="form-group" style="display: none">
					<label for="vat">Taxa</label><br>
					<div>
						<input type="text" class="form-control" id="vat" name="gstn" readonly="true" />
						<input type="hidden" class="form-control" id="vatValue" name="vatValue" />
					</div>
				</div>	  		  
			</div> <!--/col-md-6-->

			<div class="col-md-6">
				<div class="form-group">
					<label for="paid">Valor Pago</label><br>
					<div>
						<input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" />
					</div>
				</div> <!--/form-group-->			  
				<div class="form-group">
					<label for="due">À Pagar</label><br>
					<div>
						<input type="text" class="form-control" id="due" name="due" disabled="true" />
						<input type="hidden" class="form-control" id="dueValue" name="dueValue" />
					</div>
				</div> <!--/form-group-->		
				<div class="form-group">
					<label for="clientContact">Forma de Pagamento</label><br>
					<div>
						<select class="form-control" name="paymentType" id="paymentType">
							<option value="">selecionar</option>
							<option value="1">Cheque</option>
							<option value="2">Dinheiro</option>
							<option value="3">Cartão de Credito</option>
						</select>
					</div>
				</div> <!--/form-group-->							  
				<div class="form-group">
					<label for="clientContact">Situação do Pagamento</label>
					<div>
						<select class="form-control" name="paymentStatus" id="paymentStatus">
							<option value="">selecionar</option>
							<option value="1">Pago</option>
							<option value="2">Adiantado</option>
							<option value="3">Sem Pagar</option>
						</select>
					</div>
				</div> <!--/form-group-->
				<div class="form-group" style="display: none">
					<label for="clientContact">Local de Pagamento</label>
					<div>
						<select class="form-control" name="paymentPlace" id="paymentPlace">
							<option value="1">In Gujarat</option>
							<option value="2">Out Of Gujarat</option>
						</select>
					</div>
				</div> <!--/form-group-->							  
			</div> <!--/col-md-6-->


			<div class="form-group submitButtonFooter">

					<button type="button" class="btn btn-danger btn-lg" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Adicionar </button>

					<button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success btn-lg"><i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>

					<button type="reset" class="btn btn-danger btn-lg" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Refazer</button>

			</div>
		</form>
	<?php } else if($_GET['o'] == 'manord') { 
			// manage order
		?>

		<div id="success-messages"></div>
		<div class="table-responsive">
			<table class="table table-striped table-hover" id="manageOrderTable">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Data</th>
						<th>Cliente</th>
						<th>Contato</th>
						<th>Itens Ped.</th>
						<th>Situação</th>
						<th>Opção</th>
					</tr>
				</thead>
			</table>
		</div>
		<?php 
		// /else manage order
	} else if($_GET['o'] == 'editOrd') {
			// get order
		?>

		<div class="success-messages"></div> <!--/success-messages-->

		<form class="form-horizontal" method="POST" action="php_action/editOrder.php" id="editOrderForm">

			<?php $orderId = $_GET['i'];

			$sql = "SELECT orders.order_id, orders.order_date, orders.client_name, orders.client_contact, orders.sub_total, orders.vat, orders.total_amount, orders.discount, orders.grand_total, orders.paid, orders.due, orders.payment_type, orders.payment_status,orders.payment_place,orders.gstn FROM orders 	
			WHERE orders.order_id = {$orderId}";

			$result = $connect->query($sql);
			$data = $result->fetch_row();
			?>

			<div class="form-group">
				<label for="orderDate">Data</label><br>
				<div>
					<input type="text" class="form-control" id="orderDate" name="orderDate" autocomplete="off" value="<?php echo $data[1] ?>" />
				</div>
			</div> <!--/form-group-->
			<div class="form-group">
				<label for="clientName">Cliente</label><br>
				<div>
					<input type="text" class="form-control" id="clientName" name="clientName"  autocomplete="off" value="<?php echo $data[2] ?>" />
				</div>
			</div> <!--/form-group-->
			<div class="form-group">
				<label for="clientContact">Contato</label><br>
				<div>
					<input type="text" class="form-control" id="clientContact" name="clientContact" autocomplete="off" value="<?php echo $data[3] ?>" />
				</div>
			</div> <!--/form-group-->			  
			<div class="table-responsive">
				<table class="table table-striped table-hover" id="productTable">
					<thead class="thead-dark">
						<tr>			  			
							<th style="width:40%;">Produto</th>
							<th style="width:20%;">Preço</th>
							<th style="width:15%;">Qtd. Disp.</th>			  			
							<th style="width:15%;">Quantidade</th>			  			
							<th style="width:15%;">Total</th>			  			
							<th style="width:10%;"></th>
						</tr>
					</thead>
					<tbody>
						<?php

						$orderItemSql = "SELECT order_item.order_item_id, order_item.order_id, order_item.product_id, order_item.quantity, order_item.rate, order_item.total FROM order_item WHERE order_item.order_id = {$orderId}";
						$orderItemResult = $connect->query($orderItemSql);
						// $orderItemData = $orderItemResult->fetch_all();						

						// print_r($orderItemData);
						$arrayNumber = 0;
			  		// for($x = 1; $x <= count($orderItemData); $x++) {
						$x = 1;
						while($orderItemData = $orderItemResult->fetch_array()) { 
			  			// print_r($orderItemData); ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="margin-left:20px;">
			  					<div class="form-group">

			  						<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  							<option value="">selecionar</option>
			  							<?php
			  							$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity != 0";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array()) {									 		
			  								$selected = "";
			  								if($row['product_id'] == $orderItemData['product_id']) {
			  									$selected = "selected";
			  								} else {
			  									$selected = "";
			  								}

			  								echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."' ".$selected." >".$row['product_name']."</option>";
										 	} // /while 

										 	?>
										 </select>
										</div>
									</td>
									<td style="padding-left:20px;">			  					
										<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" value="<?php echo $orderItemData['rate']; ?>" />			  					
										<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['rate']; ?>" />			  					
									</td>
									<td style="padding-left:20px;">
										<div class="form-group">
											<?php
											$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity != 0";
											$productData = $connect->query($productSql);

											while($row = $productData->fetch_array()) {									 		
												$selected = "";
												if($row['product_id'] == $orderItemData['product_id']) { 
													echo "<p id='available_quantity".$row['product_id']."'>".$row['quantity']."</p>";
												}
												else {
													$selected = "";
												}

			  								//echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."' ".$selected." >".$row['product_name']."</option>";
										 	} // /while 

										 	?>

										 </div>
										</td>
										<td style="padding-left:20px;">
											<div class="form-group">
												<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" value="<?php echo $orderItemData['quantity']; ?>" />
											</div>
										</td>
										<td style="padding-left:20px;">			  					
											<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" value="<?php echo $orderItemData['total']; ?>"/>			  					
											<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['total']; ?>"/>			  					
										</td>
										<td>

											<button class="btn btn-danger btn-lg removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
										</td>
									</tr>
									<?php
									$arrayNumber++;
									$x++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="subTotal">Subtotal</label><br>
					<div>
						<input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" value="<?php echo $data[4] ?>" />
						<input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" value="<?php echo $data[4] ?>" />
					</div>
				</div> <!--/form-group-->			  

				<div class="form-group">
					<label for="totalAmount">Valor Total</label><br>
					<div>
						<input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true" value="<?php echo $data[6] ?>" />
						<input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" value="<?php echo $data[6] ?>"  />
					</div>
				</div> <!--/form-group-->			  
				<div class="form-group">
					<label for="discount">Desconto</label><br>
					<div>
						<input type="text" class="form-control" id="discount" name="discount" onkeyup="discountFunc()" autocomplete="off" value="<?php echo $data[7] ?>" />
					</div>
				</div> <!--/form-group-->	
				<div class="form-group">
					<label for="grandTotal">Total Geral</label><br>
					<div>
						<input type="text" class="form-control" id="grandTotal" name="grandTotal" disabled="true" value="<?php echo $data[8] ?>"  />
						<input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" value="<?php echo $data[8] ?>"  />
					</div>
				</div> <!--/form-group-->	
				<div class="form-group" style="display: none">
					<label for="vat" class="col-sm-3 control-label gst"><?php if($data[13] == 2) {echo "IGST 18%";} else echo "GST 18%"; ?></label><br>
					<div>
						<input type="text" class="form-control" id="vat" name="vat" disabled="true" value="<?php echo $data[5] ?>"  />
						<input type="hidden" class="form-control" id="vatValue" name="vatValue" value="<?php echo $data[5] ?>"  />
					</div>
				</div> 
				<div class="form-group" style="display: none">
					<label for="gstn" class="col-sm-3 control-label gst">G.S.T.IN</label><br>
					<div>
						<input type="text" class="form-control" id="gstn" name="gstn" value="<?php echo $data[14] ?>"  />
					</div>
				</div><!--/form-group-->		  		  
			</div> <!--/col-md-6-->

			<div class="col-md-6">
				<div class="form-group">
					<label for="paid">Valor Pago</label><br>
					<div>
						<input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" value="<?php echo $data[9] ?>"  />
					</div>
				</div> <!--/form-group-->			  
				<div class="form-group">
					<label for="due">À Pagar</label><br>
					<div>
						<input type="text" class="form-control" id="due" name="due" disabled="true" value="<?php echo $data[10] ?>"  />
						<input type="hidden" class="form-control" id="dueValue" name="dueValue" value="<?php echo $data[10] ?>"  />
					</div>
				</div> <!--/form-group-->		
				<div class="form-group">
					<label for="clientContact">Forma de pagamento</label><br>
					<div>
						<select class="form-control" name="paymentType" id="paymentType" >
							<option value="">selecionar</option>
							<option value="1" <?php if($data[11] == 1) {
								echo "selected";
							} ?> >Cheque</option>
							<option value="2" <?php if($data[11] == 2) {
								echo "selected";
							} ?>  >Dinheiro</option>
							<option value="3" <?php if($data[11] == 3) {
								echo "selected";
							} ?> >Cartão de Credito</option>
						</select>
					</div>
				</div> <!--/form-group-->							  
				<div class="form-group">
					<label for="clientContact">Situação do Pagamento</label><br>
					<div>
						<select class="form-control" name="paymentStatus" id="paymentStatus">
							<option value="">selecionar</option>
							<option value="1" <?php if($data[12] == 1) {
								echo "selected";
							} ?>  >Pago</option>
							<option value="2" <?php if($data[12] == 2) {
								echo "selected";
							} ?> >Adiantado</option>
							<option value="3" <?php if($data[10] == 3) {
								echo "selected";
							} ?> >Sem Pagar</option>
						</select>
					</div>
				</div> <!--/form-group-->
				<div class="form-group" style="display: none">
					<label for="clientContact">Local de Pagamento</label><br>
					<div>
						<select class="form-control" name="paymentPlace" id="paymentPlace">
							<option value="">selecionar</option>
							<option value="1" <?php if($data[13] == 1) {
								echo "selected";
							} ?>  >In Gujarat</option>
							<option value="2" <?php if($data[13] == 2) {
								echo "selected";
							} ?> >Out Gujarat</option>
						</select>
					</div>
				</div>							  
			</div> <!--/col-md-6-->


			<div class="form-group editButtonFooter">
					<button type="button" class="btn btn-primary btn-lg" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Adicionar </button>

					<input type="hidden" name="orderId" id="orderId" value="<?php echo $_GET['i']; ?>" />

					<button type="submit" id="editOrderBtn" data-loading-text="Loading..." class="btn btn-success btn-lg"><i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>

				</div>
			</div>
		</form>

		<?php
	} // /get order else  ?>


</div> <!--/panel-->	
</div> <!--/panel-->	


<!-- edit order -->
<div class="modal fade" tabindex="-1" role="dialog" id="paymentOrderModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i> Editar Pagamento</h4>
			</div>      

			<div class="modal-body form-horizontal" style="max-height:500px; overflow:auto;" >

				<div class="paymentOrderMessages"></div>


				<div class="form-group">
					<label for="due">À Pagar</label><br>
					<div>
						<input type="text" class="form-control" id="due" name="due" disabled="true" />					
					</div>
				</div> <!--/form-group-->		
				<div class="form-group">
					<label for="payAmount">Valor Pago</label><br>
					<div>
						<input type="text" class="form-control" id="payAmount" name="payAmount"/>					      
					</div>
				</div> <!--/form-group-->		
				<div class="form-group">
					<label for="clientContact">Forma de Pagamento</label><br>
					<div>
						<select class="form-control" name="paymentType" id="paymentType" >
							<option value="">selecionar</option>
							<option value="1">Cheque</option>
							<option value="2">Cash</option>
							<option value="3">Credit Card</option>
						</select>
					</div>
				</div> <!--/form-group-->							  
				<div class="form-group">
					<label for="clientContact">Situação</label><br>
					<div>
						<select class="form-control" name="paymentStatus" id="paymentStatus">
							<option value="">selecionar</option>
							<option value="1">Pago</option>
							<option value="2">Adiantado</option>
							<option value="3">Sem Pagamento</option>
						</select>
					</div>
				</div> <!--/form-group-->							  				  

			</div> <!--/modal-body-->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
				<button type="button" class="btn btn-primary btn-lg" id="updatePaymentOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>	
			</div>           
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /edit order-->

<!-- remove order -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeOrderModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remover Pedido</h4>
			</div>
			<div class="modal-body">

				<div class="removeOrderMessages"></div>

				<p>Deseja realmente remover ?</p>
			</div>
			<div class="modal-footer removeProductFooter">
				<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Não</button>
				<button type="button" class="btn btn-primary btn-lg" id="removeOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Sim</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove order-->


<script src="custom/js/order.js"></script>

<?php require_once 'includes/footer.php'; ?>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->
</body>
</html>