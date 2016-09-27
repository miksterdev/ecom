<!-- Config -->
<?php require_once("../resources/config.php"); ?>

<!-- Header And Navigation -->
<?php include(TEMPLATE_FRONT .  "/header.php"); ?>

    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->

            <?php include(TEMPLATE_FRONT . "/category.php"); ?>
            </div>

            <?php 
            
            $query = query(" SELECT * FROM products WHERE product_id =" . escape_value($_GET['id']) . " ");
            confirm($query);

            while($row = fetch_array($query)):



            ?>


<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">

    <?php

     $image = <<<DELIMETER

     <img src="{$row['product_image']}" alt=""></a>

DELIMETER;

echo $image;

?>

    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><a href="#"><?php echo $row['product_title'] ?></a> </h4>
        <hr>
        <h4 class="">&#36;<?php echo $row['product_price'] ?></h4>
        <p><?php echo $row['product_shortdesc'] ?></p>

   
    <form action="">
        <div class="form-group">
            <?php echo "<a class='btn btn-primary' href='cart.php?add={$row['product_id']}'>Add To Cart</a>"; ?>
        </div>
    </form>

    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<p></p>
           
    <p><?php echo $row['product_description'] ?></p>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

  

    </div>

 </div>

 </div>

</div>


</div><!--Row for Tab Panel-->


</div> <!-- Col-md-9 ends here -->

<?php endwhile; ?>

</div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
       <?php include(TEMPLATE_FRONT .  "/footer.php"); ?>