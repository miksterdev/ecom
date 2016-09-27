<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . "/header.php"); ?>

<?php

if(!isset($_SESSION['username']))

redirect("../../public")


?>
    
    <!-- {} -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hi <?php echo $_SESSION['username']; ?>! Welcome to your Dashboard - <small>Statistics Overview</small>
                        </h1>
                        <h2><?php display_message(); ?></h2>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>

                <?php 

                if($_SERVER['REQUEST_URI'] == "/ecom/public/admin/" || $_SERVER['REQUEST_URI'] == "/ecom/public/admin/index.php") {

                    include(TEMPLATE_BACK . "/admin_content.php");

                }

                
                if(isset($_GET['orders'])) {

                    include(TEMPLATE_BACK . "/orders.php");

                }
                
                
                ?>


                 <!-- FIRST ROW WITH PANELS -->

                <!-- /.row -->
               

                    <?php include(TEMPLATE_BACK . "/footer.php"); ?>