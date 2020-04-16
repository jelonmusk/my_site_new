        <?php
session_start();
if(isset($_SESSION['login_email']))
{
    if(isset($_GET['prod_id']))
    {
        $email_id= $_SESSION['login_email'];
        $prod_id= $_GET['prod_id'];
        $quantity= $_GET['quantity'];
        if($_GET['product']=="book")
        {
            $product_type=1;
        }
        else if($_GET['product']=="e_stuff")
        {
            $product_type=2;
        }

        /*echo "Email ID: ".$email_id."Product ID: ".$prod_id."Quantity: ".$quantity."Product Type: ".$product_type;*/

        /*FETCHING USER DETAILS*/
        $conn_id=5;
        require 'connect.php';
        $sql= "SELECT * FROM user_details WHERE email = '$email_id'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
            while($row = $result->fetch_assoc()) {
                $user_id= $row["user_id"];
                $address= $row["address"];
                $mobile= $row["mobile"];
                $city= $row["city"];
                $state= $row["state"];
            }
        }

        /*GENERATING ORDER ID*/        
        function generate_order_id()
        {
            $number= "ORDS".rand(10000,999999);            
            return $number;
        }
        $order_id = generate_order_id();

        /*CHECKING IF ORDER ID EXISTS*/
        $conn_id=6;
        require 'connect.php';
        $sql= "SELECT order_id FROM orders WHERE order_id = '$order_id'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
            $order_id = generate_order_id();  /*If order_id exists regenerate order_id*/
        }

        /*FETCHING BOOK DETAILS*/
        if($product_type==1)
        {
            $conn_id=1;
            require 'connect.php';
            $sql= "SELECT * FROM books WHERE id = '$prod_id'";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            if($count > 0)
            {
                while($row = $result->fetch_assoc()) {
                    $title= $row["title"];
                    $price= $row["price"];
                    $author= $row["author"];
                }
            }
            $final_price =($quantity * $price);
            $product_details= <<<EOT
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-family:'Playfair Display'; font-weight:600; font-size:24px;">Order Details</p>
                        <p style="font-size:18px;  color:#757575;">Order ID: $order_id </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-family:'Playfair Display'; font-weight:600; font-size:22px;">Product Type: Book</p>  
                        <div class="row order_details">
                            <div class="col-md-6">Title: <span>$title</span></div>
                            <div class="col-md-6" style="text-align:left;">Author: <span>$author</span></div>
                        </div>
                        <div class="row order_details">
                            <div class="col-md-6">Price: <span>$price</span></div>
                            <div class="col-md-6" style="text-align:left;">Quantity: <span>$quantity</span></div>
                        </div>
                        <div class="row order_details">
                            <div class="col-md-6">Address: <span>$address</span></div>
                            <div class="col-md-6" style="text-align:left;">Mobile Number: <span>$mobile</span></div>
                        </div>
                        <hr>
                        <div class="row order_details">
                            <div class="col-md-6">Order Total:</div>
                            <div class="col-md-6" style="text-align:left;">$final_price</div>
                        </div>
                        <div class="row" style="padding-top:20px; padding-bottom:20px">
                            <div class="col-md-6" style="display:flex;justify-content:center;"></div>
                            <div class="col-md-6" style="display:flex;justify-content:center;">
                                <form method="post" action="paytm/pgRedirect.php">
                                    <input id="ORDER_ID" name="ORDER_ID" value="$order_id" type="hidden">
                                    <input id="CUST_ID" name="CUST_ID" value="$user_id" type="hidden">
                                    <input id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail" type="hidden">
                                    <input id="CHANNEL_ID" name="CHANNEL_ID" value="WEB" type="hidden">
                                    <input id="CALLBACK_URL" name="CALLBACK_URL" value="http://localhost/my_site_new/paytm/pgResponse.php" type="hidden">
                                    <input title="TXN_AMOUNT" name="TXN_AMOUNT" value="$final_price" type="hidden">
                                    <button type="button" class="btn btn-danger" style="margin-right:40px;">Go Back</button>
                                    <button type="submit" class="btn btn-warning">Proceed to Pay</button>
                                </form>
                            </div>
                        </div>
                    </div>                            
                </div>
                <hr>
            </div>
EOT;
        }
        /*FETCHING ESTUFF DETAILS*/
        if($product_type==2)
        {
            $conn_id=2;
            require 'connect.php';
            $sql= "SELECT * FROM e_stuff WHERE id = '$prod_id'";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            if($count > 0)
            {
                while($row = $result->fetch_assoc()) {
                    $item= $row["item"];
                    $type_id= $row["type_id"];
                    $man_id= $row["man_id"];
                    $price= $row["price"];
                }
            }
            $sql= "SELECT * FROM manufacturer WHERE id = '$man_id'";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            if($count > 0)
            {
                while($row = $result->fetch_assoc()) {
                    $manufacturer= $row["name"];
                }
            }
            $sql= "SELECT * FROM e_stuff WHERE id = '$prod_id'";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            if($count > 0)
            {
                while($row = $result->fetch_assoc()) {
                    $item= $row["item"];
                    $type_id= $row["type_id"];
                    $man_id= $row["man_id"];
                    $price= $row["price"];
                }
            }
            $final_price = ($quantity * $price);
            $product_details= <<<EOT
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-family:'Playfair Display'; font-weight:600; font-size:24px;">Order Details</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-family:'Playfair Display'; font-weight:600; font-size:22px;">Product Type: Electroinc</p>  
                        <div class="row order_details">
                            <div class="col-md-6">Title: <span>$item</span></div>
                            <div class="col-md-6" style="text-align:left;">Manufacturer: <span>$manufacturer</span></div>
                        </div>
                        <div class="row order_details">
                            <div class="col-md-6">Price: <span>$price</span></div>
                            <div class="col-md-6" style="text-align:left;">Quantity: <span>$quantity</span></div>
                        </div>
                        <div class="row order_details">
                            <div class="col-md-6">Address: <span>$address</span></div>
                            <div class="col-md-6" style="text-align:left;">Mobile Number: <span>$mobile</span></div>
                        </div>
                        <hr>
                        <div class="row order_details">
                            <div class="col-md-6">Order Total:</div>
                            <div class="col-md-6" style="text-align:left;">$final_price</div>
                        </div>

                        <div class="row" style="padding-top:20px; padding-bottom:20px">
                            <div class="col-md-6" style="display:flex;justify-content:center;"></div>
                            <div class="col-md-6" style="display:flex;justify-content:center;">
                                <button type="button" class="btn btn-danger" style="margin-right:40px;">Go Back</button>
                                <button type="button" class="btn btn-warning">Proceed to Pay</button>
                            </div>
                        </div>
                    </div>                            
                </div>
                <hr>
            </div>
EOT;
        }        
    }
    else
    {
        echo("Prod ID missing");
    }
}
else
{
    echo "User not logged in";
}
?>

<style>
    .order_details
    {
        font-weight: 600;
        color: black;
        font-size: 20px;
        padding-top:10px;
        padding-bottom: 10px;
    }
    .order_details span
    {
        font-weight: 400;
        color:#757575;
    }
</style>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!--GOOGLE FONTS-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap" rel="stylesheet">

        <!--MAIN CSS-->
        <link rel="stylesheet" href="css/main.css">

        <!--ICON & TITLE-->
        <link rel="icon" href="assets/icon.png">
        <title>Books Online</title>

        <!--FONTAWESOME-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!--NAVBAR-->
        <?php include 'header.php'; ?>

        <section class="create_order" style="margin-top:125px; margin-bottom:75px;">
            <div class="container">
                <div class="row">
                    <?php echo $product_details; ?>
                </div>
            </div>

            <script>
                function send_payment_data()
                {
                    var order_id = '<?php echo $order_id; ?>';
                    var cust_id = '<?php echo $user_id; ?>';
                    var amount = '<?php echo $final_price; ?>';
                    var industry_type = "RETAIL";
                    var channel = "WEB";

                    alert("Order ID: "+order_id+"Customer_ID: "+cust_id+"Amount: "+amount+"industry: "+industry_type+"Channel: "+channel);
                }
            </script>

            

        </section>

        <!--FOOTER-->
        <?php  include 'footer.php'; ?>
    </body>
</html>