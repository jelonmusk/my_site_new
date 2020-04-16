<style>
    .order_wrap
    {
        margin-top: 25px;
        margin-bottom: 25px;       
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        padding:30px;
    }
    .order_wrap:hover
    {
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }
    .order_wrap:nth-child(odd)
    {        
        background-color: #b3e5fc; 
    }
    .order_wrap:nth-child(even)
    {        
        background-color: #fff176; 
    }

    /*FOR MOBILE SCREENS*/
    @media only screen and (max-width: 767px){
        .head2
        {
            text-align: left!important;
        }
        .image_wrap
        {
            display:flex;
            justify-content: center;
            align-items: center;            
            margin-bottom:25px;
        }
        .details_left p
        {
            text-align: center;
            width:100%;
        }
        .details_right p
        {
            text-align:center!important;
        }
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

        <section class="my_orders" style="margin-top:100px; margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"><p style="font-family: 'Playfair Display'; font-weight:600; font-size:22px;" class="head1">Orders</p></div>
                    <div class="col-md-6"><p style="width:100%;  font-family: 'Playfair Display'; font-weight:600; font-size:22px; text-align:right;" class="head2">Total Orders: </p></div>
                </div>
                <div class="row order_wrap">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 image_wrap">
                                        <img src='assets/book.jpg' class="img-fluid" width="120">
                                    </div>
                                    <div class="col-md-6 details_left">
                                        <div class="row"><p style="font-family:'Playfair Display'; font-weight:600; font-size:18px;">Product Title</p></div>
                                        <div class="row"><p style="font-size:16px; color:#757575;">Order ID : OD12345678</p></div>
                                        <div class="row"><p style="font-size:16px; color:#757575;">Mobile Number : +91 1234567890</p></div>                                    
                                        <div class="row"><p style="font-size:16px; color:#757575;">Address : No.17, Behind Dhonti Complex, Scout Camp Road, Near Railway Station, Doddaballapur</p></div>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 details_right">
                                <p style="width:100%; text-align:right; font-family:'Playfair Display'; font-weight:600; font-size:18px;">Price: Rs. 2100</p>
                                <p style="width:100%; text-align:right; font-size:16px; color:#757575;">Quantity: 2</p>
                                <p style="width:100%; text-align:right; font-size:16px; color:#757575;">Date : 31-10-2019</p>
                                <p style="width:100%; text-align:right; font-size:16px; color:#757575;">Time : 09:50 PM</p>
                                <p style="width:100%; text-align:right; font-size:16px; color:#757575;">Payment : Successful</p>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </section>

        <!--FOOTER-->
        <?php include 'footer.php'; ?>
    </body>
</html>