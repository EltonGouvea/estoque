<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$productId = $_POST['productId'];

if($productId) { 

 $sql = "UPDATE product SET active = 2, status = 2 WHERE product_id = {$productId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Removido com Sucesso";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Ocorreu um erro!";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST