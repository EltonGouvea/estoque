<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$categoriesName = $_POST['categoriesName'];
  $categoriesStatus = $_POST['categoriesStatus']; 

	$sql = "INSERT INTO categories (categories_name, categories_active, categories_status) 
	VALUES ('$categoriesName', '$categoriesStatus', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Adicionado com Sucesso";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Ocorreu um erro durante a criação";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST