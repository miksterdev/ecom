<?php

// {}

function set_message($msg) {

if(!empty($msg)) {
    $_SESSION['message'] = $msg;
} else {

$msg = "";

}

}

function display_message() {

    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

}

function redirect($location) {

header("Location: $location ");

}

function query($sql) {

    global $connection;

    return mysqli_query($connection, $sql);

}

function confirm($result) {

    global $connection;

    if(!$result) {

        die("Query Failed " . mysqli_error($connection));

    }

}

function escape_value($string) {

    global $connection;

    return mysqli_real_escape_string($connection, $string);

}


function fetch_array($result) {

return mysqli_fetch_array($result);

}

/************************ FRONT END FUNCTIONS ************************/

// Get Product

function get_products() {

$query = query("SELECT * FROM products");
confirm($query);

while($row = fetch_array($query)) {

    $product = <<<DELIMETER

    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
            <div class="caption">
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                </h4>
                <p>{$row['product_shortdesc']}</p>
                <a class="btn btn-primary" href="cart.php?add={$row['product_id']}">Add To Cart</a>
            </div>

        </div>
    </div>

DELIMETER;

echo $product;

}

}

function get_products_in_categories() {

$query = query("SELECT * FROM products WHERE product_category_id = " . escape_value($_GET['id']) . " ");
confirm($query);

while($row = fetch_array($query)) {

$product_cat = <<<DELIMETER

    <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
            <div class="caption">
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                </h4>
                <p>{$row['product_shortdesc']}</p>
                <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">Add To Cart</a>
            </div>

        </div>
    </div>

DELIMETER;

echo $product_cat;

}

}

function get_products_in_shop() {

$query = query("SELECT * FROM products");
confirm($query);

while($row = fetch_array($query)) {

$product_cat = <<<DELIMETER

    <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
            <div class="caption">
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                </h4>
                <p>{$row['product_shortdesc']}</p>
                <a class="btn btn-primary" href="cart.php?add={$row['product_id']}">Add To Cart</a>
            </div>

        </div>
    </div>

DELIMETER;

echo $product_cat;

}

}



function get_categories() {

        $query = query("SELECT * FROM categories");
        confirm($query);

        while($row = fetch_array($query)) {

$categories_links = <<<DELIMETER

    <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;

echo $categories_links;

        }

}

function login_user() {

if(isset($_POST['submit'])) {

$username = escape_value($_POST['username']);
$password = escape_value($_POST['password']);

$query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
confirm($query);

if(mysqli_num_rows($query) == 0) {

    set_message("Your password or Username is wrong.");

    redirect("login.php");


} else {

    $_SESSION['username'] = $username;

    set_message("Welcome to Admin," . " " .$username . "!");

    redirect("admin");

}

}

}

function send_message() {

    if(isset($_POST['submit'])) {
    $to         = "mikster3420@gmail.com";
    $from_name  = $_POST['name'];
    $subject    = $_POST['subject'];
    $email      = $_POST['email'];
    $message    = $_POST['message'];

    $headers = "From: {$from_name} {$email}";
 
    // Make the PHPMAILER function instead of mail because it's more reliable than the mail() function.

    $result = mail($to, $subject, $message, $headers);

    if(!$result) {
        set_message("Sorry we could not send your message.");
        redirect("contact.php");
    } else {
        set_message("Your Message Has Been Sent.");
        redirect("contact.php");
    }

}
}

/************************ BACK END FUNCTIONS ************************/



?>