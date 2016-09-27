<!-- Config -->
<?php require_once("../resources/config.php"); ?>

<!-- Header And Navigation -->
<?php include(TEMPLATE_FRONT .  "/header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header>
            <h1>Shop</h1>
        </header>

        <hr>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
            <?php echo get_products_in_shop(); ?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
       <?php include(TEMPLATE_FRONT .  "/footer.php"); ?>
