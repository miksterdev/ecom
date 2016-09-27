<!-- Config -->
<?php require_once("../resources/config.php"); ?>

<!-- Header And Navigation -->
<?php include(TEMPLATE_FRONT .  "/header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>Categories!</h1>
            <p>Here you can see all the products in the same category as you chose.</p>

            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
            <?php echo get_products_in_categories(); ?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
       <?php include(TEMPLATE_FRONT .  "/footer.php"); ?>
