<?php require_once 'php_action/core.php'; ?>

<!doctype html>
<html lang="pt-br" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Gerenciador de Estoque">
  <meta name="keywords" content="HTML,CSS,PHP,JavaScript">
  <meta name="author" content="Bruno Alexandre Herculano">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap -->
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap theme-->
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
  <script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
  <script src="assests/bootstrap/js/bootstrap.min.js"></script>

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type="text/css">
  .btn-default{
    background:#dc3545; 
    color: white;
  }
  .panel-heading{
    background: #3e454c; 
    color: white;
    font-size: 20px;
  }
 {
    font-size: 20px;
  }
  .modal-dialog{
    margin-top: 200px;
    font-size: 20px;
  }
  select.form-control:not([size]):not([multiple]){
    height: 34px;
  }
th, td, .btn, #success-menssages, .col-md-12, .form-control, label, option, a, span, p {
  font-size: 20px;
}
.modal-footer, .div-btn{
  text-align: center;
}
.modal-body{
  padding: 15px;
}
#ui-datepicker-div{
  width: auto;
}


</style>
<script src="js/modernizr.js"></script> <!-- Modernizr -->

<title>Sistema Gerenciador de Estoque</title>
</head>

<body>
  <header class="cd-main-header">
    <a href="#0" class="cd-logo"><img src="img/logotipo-fatec.png" style="filter: brightness(1000%);" height="25px;" alt="Logo"></a>
    
    <div class="cd-search is-hidden">
      <form action="#0">
        <input type="search" placeholder="Search...">
      </form>
    </div> <!-- cd-search -->

    <a href="#0" class="cd-nav-trigger"><span></span></a>

    <nav class="cd-nav">
      <ul class="cd-top-nav">
        <li class="has-children account" id="navSetting">
          <a href="#0">
            <i class="glyphicon glyphicon-user"></i>
            Conta
          </a>
          <ul>
            <?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
              <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Minha conta</a></li>
              <li id="topNavUser"><a href="user.php"> <i class="glyphicon glyphicon-plus"></i> Adicionar usuário</a></li>
            <?php } ?>              
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li> 
          </ul>
        </li>
      </ul>
    </nav>
  </header> <!-- .cd-main-header -->

  <main class="cd-main-content">
    <nav class="cd-side-nav">
      <ul>
        <li id="navDashboard"><a href="dashboard.php"><i class="glyphicon glyphicon-list-alt"></i>  Dashboard</a></li>        
        <?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
          <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i> Marcas</a></li>        
        <?php } ?>
        <?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
          <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Categorias</a></li>        
        <?php } ?>
        <?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
          <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Produtos </a></li> 
        <?php } ?>

        <li class="has-children bookmarks" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Pedidos <span class="caret"></span></a>
          <ul >            
           <a href="orders.php?o=add"> <li id="topNavAddOrder"> <i class="glyphicon glyphicon-plus"></i> Adicionar Pedido</li></a>            
           <a href="orders.php?o=manord"> <li id="topNavManageOrder"> <i class="glyphicon glyphicon-edit"></i> Gerenciar Pedidos</li></a>            
          </ul>
        </li> 

        <?php  if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
          <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"></i> Relatório </a></li>
        <?php } ?>   
      </ul>

      <ul>
        <li class="cd-label">Ação</li>
        <li class="action-btn"><a href="logout.php">Sair</a></li>
      </ul>
    </nav>