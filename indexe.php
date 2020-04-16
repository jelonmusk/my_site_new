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
        <!--JQUERY MINIFIED-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <!--POPPER and BOOTSTRAP SCRIPTS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>        
        <!--BOOTPAG SCRIPT-->
        <script src="js/bootpag.min.js"></script>
        
        
        <!--NAVBAR-->        
        <?php include 'header.php'; ?>
        
        <!--FULL PAGE IMAGE SLIIDER-->
        <header class="main" id="main">
            <!--CAROUSEL SLIDESHOW-->
            <div id="slideshow" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#slideshow" data-slide-to="0" class="active"></li>
                <li data-target="#slideshow" data-slide-to="1"></li>
                <li data-target="#slideshow" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('assets/carousel/slide1.jpg')">
                        <!--<div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">First Slide</h2>
                        <p class="lead">This is a description for the first slide.</p>
                        </div>-->
                    </div>s
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('assets/carousel/slide2.jpg')">
                        <!--<div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">Second Slide</h2>
                        <p class="lead">This is a description for the second slide.</p>
                        </div>-->
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('assets/carousel/slide3.jpg')">
                        <!--<div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">Third Slide</h2>
                        <p class="lead">This is a description for the third slide.</p>
                        </div>-->
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>        
        </header>
        
        <!--E-STUFF SECTION-->
        <section  class="e_stuff" id="e_stuff">
            <div class="container">
                <!--E-STUFF NAVIGATION-->
                <div class="row">
                    <ul class="nav justify-content-center w-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">All E-stuff</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bestsellers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">New E-stuff</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Used E-stuff</a>
                        </li>
                    </ul>
                </div>
                <div class="row image_row" style="display:none;">
                    <?php
                        $conn_id=1;
                        require 'connect.php';
                    
                        /*FETCHING DATA*/
                        $sql = "SELECT * FROM e_stuff";
                        $result = $conn->query($sql);
                        $count=1;
                        while($row = $result->fetch_assoc()) 
                        {
                            $id = $row["id"];
                            $item = $row["item"];
                            $specification = $row["specification"];
                            $type_id = $row["type_id"];
                            $price = $row["price"];
                            $discount_id = $row["discount"];
                            $man_id = $row["man_id"];
                            $version = $row["version"];
                            $new = $row["new"];
                            $image = $row["image"];
                            
                            $encoded_image = base64_encode($image);
                            $images = "<img src='data:image/jpeg;base64,{$encoded_image}' class='image' width=215  height=375>";
                            
                            
                            $col = <<<EOT
                            <div class="col-md-4">
                                <div class="row image">
                                    $images
                                </div>
                                <div class="row title">
                                    <p data-toggle="title p" data-placement="top" title="$item">
                                    $item
                                    </p>
                                </div>
                                <div class="row price">
                                    <p>Rs. $price</p>
                                </div>
                            </div>
EOT;
                            
                            echo $col;
                            
                           $count++; 
                        }
                    ?>                    
                </div>
            </div>
            <div class="container">
                <!--E-STUFF DISPLAY DIV-->
                <div class="row"  id="e_stuff_display">                    
                </div>
                <!--LOADER-->
                <div class="text-center" style="padding-top:25px;padding-bottom:25px; display:none;" id="loader">
                    <p style="font-family: 'Playfair Display'; font-size:18px;">Loading... Please Wait</p>
                    <div class="spinner-grow" role="status">
                    <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!--PAGINATION DIV-->
                <div class="row justify-content-center" id="pagination">
                </div>
            </div>
            
            <!--BOOTPAG PAGINATION-->
                    
            <!--FETCHING TOTAL PAGES-->
            <?php
                include('connect.php'); 
                $limit = 3;
                $sql = "SELECT COUNT(id) FROM e_stuff";  
                $rs_result = mysqli_query($conn, $sql);  
                $row = mysqli_fetch_row($rs_result);  
                $total_records = $row[0];  
                $total_pages = ceil($total_records / $limit);   
            ?>
            
            <!--AJAX PAGINATION SCRIPT-->
            <script>
                $("#e_stuff_display").load("fetch_e_stuff?page="+1); /*Loading first page*/
                $('#pagination').bootpag({
                    total: <?php echo $total_pages ?>,
                    page: 1,   /*DEFAULT PAGE*/
                    maxVisible: 5
                    }).on('page', function(event, num){                   
                     
                    document.getElementById("loader").style.display = "block";
                    $('#e_stuff_display').load("fetch_e_stuff.php?page="+num, function(response, status, xhr) {
                        if ( status == "error" ) {
                            alert("Error occured: " + xhr.status + " " + xhr.statusText );
                        } else {                            
                            document.getElementById("loader").style.display = "none";
                            
                        }

                    });
                });
            </script>
        </section>
    
    </body>
</html>