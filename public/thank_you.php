<!-- Config -->
<?php require_once("../resources/config.php"); ?>

<?php require_once("cart.php"); ?>

<!-- Header And Navigation -->
<?php include(TEMPLATE_FRONT .  "/header.php"); ?>

<?php

if(isset($_GET['tx'])) {

$amount   = $_GET['amt'];
$currency = $_GET['cc'];
$taxes    = $_GET['tx'];
$status   = $_GET['st'];

$query = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency)
 VALUES('{$amount}', '{$currency}', '{$taxes}', '{$status}')");

confirm($query);

session_destroy(); 

} else {

    redirect("index.php");

}

?>


    <!-- Page Content -->
    <div class="container">

    <h1 class="text-center">Thank You!</h1>
    <p class="text-center">We are glad to have you as a customer, you will get your product in between 3-7 days.<br>If you have any problems you can always contact us.</p>

    </div><!--Main Content-->


           <hr>

        <!-- Footer -->
    <?php include(TEMPLATE_FRONT .  "/footer.php"); ?>