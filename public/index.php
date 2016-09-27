<!-- Config -->
<?php require_once("../resources/config.php"); ?>

<!-- Header And Navigation -->
<?php include(TEMPLATE_FRONT .  "/header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

        <?php include(TEMPLATE_FRONT . "/category.php"); ?>

        </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                       <?php include(TEMPLATE_FRONT . "/slider.php"); ?>
                    </div>

                </div>

                <div class="row">

                <h1>
                
                </h1>

                <?php get_products(); ?>
                   
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
       <?php include(TEMPLATE_FRONT .  "/footer.php"); ?>