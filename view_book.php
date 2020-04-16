<?php
    if(isset($_GET['book_id']))
    {
        $conn_id=1;
        require 'connect.php';
        $sql= "SELECT * FROM books WHERE id= $_GET[book_id]";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
			while($row = $result->fetch_assoc()) {
            
                $id = $row["id"];
                $author = $row["author"];
                $title = $row["title"];
                $genre_id = $row["genre_id"];
                $price = $row["price"];
                $discount = $row["discount"];
                $pub_id = $row["pub_id"];
                $edition = $row["edition"];
                $new = $row["new"];
                $cover = $row["cover"];
                $description = $row["description"];
                $avg_rating = $row["avg_rating"];
            }
            
        }
        
        $sql= "SELECT *  FROM  publisher WHERE id= $pub_id";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
			while($row = $result->fetch_assoc()) {            
                $publisher = $row["name"];                
            }            
        }
    }
    else
    {
        header('location: index.php');
    }
?>
<?php
    if(isset($_GET['book_id']))
    {
        $conn_id=3;
        require 'connect.php';
        $count=0;
        $count_5=0;
        $count_4=0;
        $count_3=0;
        $count_2=0;
        $count_1=0;
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            if($row["book_id"]==$_GET['book_id'])
            {
                $count++;
                if($row["rating"]==5){$count_5++;}
                if($row["rating"]==4){$count_4++;}
                if($row["rating"]==3){$count_3++;}
                if($row["rating"]==2){$count_2++;}
                if($row["rating"]==1){$count_1++;}
            }
        }
    }
?>


<style>
    /*.book_image
    {
        display: flex;
        justify-content: center;
        align-items: center;
    }*/
    .cover
    {
        
        width: 145px;
        height: 205px;        
        -webkit-box-shadow: 0px 10px 20px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 10px 20px 0px rgba(0,0,0,0.3);
        box-shadow: 0px 10px 20px 0px rgba(0,0,0,0.3);
    }    
    .book_title p
    {
        font-family: 'Playfair Display', serif;
        font-size: 26px;
        font-weight: 600;
        color: black;
        letter-spacing: 0.02rem;
    }
    .author p
    {
        font-family: 'Playfair Display', serif;
        font-size: 18px;
        font-weight: 600;
        color: #616161;
        letter-spacing: 0.04rem;
    }
    .description p
    {
        font-size: 18px;
        text-align: justify;
    }
    .avg_rating
    {
        width:100%;
        text-align: center;
        font-size: 20px;
    }
    .rating span
    {
        font-size: 70px;
    }
    .submit_rating
    {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .user_reviews_rating li
    {
        display: inline;
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
        
        <!--MAIN CSS-->
        <link rel="stylesheet" href="css/main.css">
        
        <!--GOOGLE FONTS-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
        
        <!--FONTAWESOME ICONS-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        
        <!--ICON & TITLE-->
        <link rel="icon" href="assets/icon.png">
        <title>Books Online</title>        
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--JQUERY MINIFIED-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!--BOOTPAG SCRIPT-->
        <script src="js/bootpag.min.js"></script>
        
        
        <?php include 'header.php';  ?>
        
        <!--BOOK_DETAILS-->
        <section class="book_details" style="margin-top: 125px;">
            <div class="container">
                <div class="row">                    
                    <div class="col-md-4 book_image my-auto">
                        <div class="cover row mx-auto">
                            <?php                        
                                $encoded_image = base64_encode($cover);
                                $image = "<img src='data:image/jpeg;base64,{$encoded_image}' width=145  height=205>";
                                echo $image;
                            ?>
                        </div>
                        <!--CHECK IF USER IS LOGGED IN-->
                        <?php                            
                            if(isset($_SESSION['login_email']))
                            {
                                $target1= "#add_to_cart";
                                $target2= "#buy_now";
                            }
                            else
                            {
                                $target1= "#sign_in";
                                $target2= "#sign_in";
                            }
                        ?>
                        <div class="row d-flex justify-content-center" style="margin-top:20px;">
                            <button class="btn btn-primary" style="width:125px;" data-toggle="modal" data-target="<?php echo $target1; ?>">Add to Cart</button>
                        </div>
                        <div class="row d-flex justify-content-center"style="margin-top:10px;">
                            <button class="btn btn-success" style="width:125px;" data-toggle="modal" data-target="<?php echo $target2; ?>">Buy Now</button>
                        </div>
                    </div>
                    
                    <!--SIGN IN MODAL-->
                    <div class="modal fade" id="sign_in" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        You are not signed in<br>
                                        <a href="http://localhost/my_site_new/sign_in.php">Click here</a> to sign in.<br>
                                        New here? <a href="http://localhost/my_site_new/register.php">Click here</a> to register.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!--ADD TO CART MODAL-->
                    <!-- Modal -->
                    <div class="modal fade" id="add_to_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Item to Cart</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p style="font-weight:600;"><?php echo $title; ?></p>
                                                    <p><?php echo "Rs. ".$price; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p>Quantity:</p>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-danger btn-number"  data-type="minus" data-field="quant[2]">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-outline-success btn-number" data-type="plus" data-field="quant[2]">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--NUMBER SCRIPT-->
                                        <script src="js/number.js"></script>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!--BUY NOW MODAL-->
                    <div class="modal fade" id="buy_now" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Buy Now</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p style="font-weight:600;"><?php echo $title; ?></p>
                                                    <p><?php echo "Rs. ".$price; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p>Quantity:</p>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-danger btn-number"  data-type="minus" data-field="quant[2]">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100" id="quantity">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-outline-success btn-number" data-type="plus" data-field="quant[2]">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--NUMBER SCRIPT-->
                                        <script src="js/number.js"></script>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                        <button type="submit" class="btn btn-primary" onclick="send_data(); return false;">Buy Now</button>                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!--SENDING BUY NOW DATA-->
                    <script>
                        function send_data()
                        {
                            var quantity = document.getElementById("quantity").value;
                            var book_id = <?php echo $_GET['book_id'] ?>;
                            
                            window.location.href = 'create_order.php?prod_id='+book_id+'&quantity='+quantity+'&product=book';
                            
                        }
                    </script>
                    
                    <div class="col-md-8 book_details">
                        <div class="row book_title">
                            <p><?php echo $title; ?></p>
                        </div>
                        <div class="row author">
                            <p>Author : <?php echo $author; ?><br>Publisher : <?php echo $publisher; ?></p>
                        </div>
                        <div class="row author">
                            <?php
                                if($new==1)
                                {
                                    $condition="New";
                                }
                                else
                                {
                                    $condition="Used";
                                }
                            ?>
                            <p style="color:black;">Price : Rs. <?php echo $price; ?><span style="margin-left:25px;">Condition : <?php echo $condition; ?></span></p>
                        </div>
                        <div class="row description">
                            <p><?php 
                                    $string = strip_tags($description);
                                    if (strlen($string) > 350) {

                                    // truncate string
                                    $stringCut = substr($string, 0, 500);
                                    $endPoint = strrpos($stringCut, ' ');

                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= '... <a href="#" id="more" data-toggle="modal" data-target="#more_modal">Read More</a>';
                                    }
                                    echo $string;                                
                                ?></p>
                            
                            <!--READ MORE MODAL-->
                            <div class="modal fade" id="more_modal" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="title"><?php echo $title; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                    <div class="modal-body">
                                        <?php echo $description ?>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>        
        </section>
        
        
        <!--RATING SECTION-->        
        <section class="rating">
            <div class="container">
                <hr>
                <div class="row">
                    <div class="col-md-4 rating">
                        <p class="avg_rating"><span><?php echo $avg_rating; ?></span> / 5</p>
                        <p style="width:100%; text-align:center; margin-bottom:0;">Average Customer Rating</p>
                        <p style="width:100%; text-align:center; margin-bottom:0;">Based on <?php echo $count; ?> reviews</p>
                    </div>
                    <div class="col-md-8 my-auto">
                        <?php
                            /*CALCULATING PERCENTAGE OF EACH RATING*/
                            if($count>0)
                            {
                                $progress5 = round(($count_5/$count)*100);
                                $progress4 = round(($count_4/$count)*100);
                                $progress3 = round(($count_3/$count)*100);
                                $progress2 = round(($count_2/$count)*100);
                                $progress1 = round(($count_1/$count)*100);
                            }
                            
                        
                            /*$progress5 = 50;
                            $progress4 = 50;
                            $progress3 = 50;
                            $progress2 = 50;
                            $progress1 = 50;*/
                        ?>                        
                        
                        <div class="row">
                            <div class="progress_left">
                                <div>5<i class="fa fa-star"  style="margin-left:5px;"></i></div>
                            </div>
                            <div class="progress_right" style="width:250px; margin-top:4px;margin-left:15px;">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $progress5; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress_right_count">
                                <div style="margin-left:10px;"><?php echo $count_5; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="progress_left">
                                <div>4<i class="fa fa-star"  style="margin-left:5px;"></i></div>
                            </div>
                            <div class="progress_right" style="width:250px; margin-top:4px;margin-left:15px;">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $progress4; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress_right_count">
                                <div style="margin-left:10px;"><?php echo $count_4; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="progress_left">
                                <div>3<i class="fa fa-star"  style="margin-left:5px;"></i></div>
                            </div>
                            <div class="progress_right" style="width:250px; margin-top:4px;margin-left:15px;">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $progress3; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress_right_count">
                                <div style="margin-left:10px;"><?php echo $count_3; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="progress_left">
                                <div>2<i class="fa fa-star"  style="margin-left:5px;"></i></div>
                            </div>
                            <div class="progress_right" style="width:250px; margin-top:4px;margin-left:15px;">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $progress2; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress_right_count">
                                <div style="margin-left:10px;"><?php echo $count_2; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="progress_left">
                                <div>1<i class="fa fa-star"  style="margin-left:5px;"></i></div>
                            </div>
                            <div class="progress_right" style="width:250px; margin-top:4px;margin-left:15px;">
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $progress1; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress_right_count">
                                <div style="margin-left:10px;"><?php echo $count_1; ?></div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </section>
        
        <!--FEEDBACK SECTION-->
        <!--<section class="feedback">
            <div class="container">
                <hr>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 feedback">
                        <form>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="feedback">Leave Your Feedback</label>
                                        <textarea class="form-control" id="feedback" rows="4"></textarea>
                                    </div>
                                </div>                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rating">Submit Your Rating</label>
                                        <select class="form-control" id="rating">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="submit_rating">
                                        <button type="submit" class="btn btn-primary">Submit Feedback</button>                                    
                                    </div>
                                </div>                                
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>-->
        
        <!--USER REVIEWS-->        
        <section>            
            <div class="container" id="user_review_wrap">
            <!--FETCHING TOTAL PAGES-->
            <?php
                $conn_id=3;
                include('connect.php'); 
                $limit = 6;
                $sql = "SELECT COUNT(id) FROM feedback";  
                $rs_result = mysqli_query($conn, $sql);  
                $row = mysqli_fetch_row($rs_result);  
                $total_records = $row[0];  
                $total_pages = ceil($total_records / $limit);   
            ?>
                <hr>
                <p style="font-weight:600; font-size:22px;">User Reviews  <span style="font-weight:400; font-size:16px;">(<?php echo $count;?> reviews)</span></p>
                <div id="user_reviews"></div>
                <!--LOADER-->
                <div class="text-center" style="padding-top:25px;padding-bottom:25px; display:none;" id="loader">
                    <p style="font-family: 'Playfair Display'; font-size:18px;">Loading... Please Wait</p>
                    <div class="spinner-grow" role="status">
                    <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!--PAGINATION DIV-->
                <div class="row justify-content-center" style="margin-top:25px;" id="pagination">
                </div>
            </div>
            
            <!--BOOTPAG PAGINATION SCRIPT-->
            <script>
                $("#user_reviews").load("fetch_reviews?page=1&book_id="+<?php  echo $_GET['book_id']; ?>); /*Loading first page*/
                $('#pagination').bootpag({
                    total: <?php echo $total_pages ?>,
                    page: 1,   /*DEFAULT PAGE*/
                    maxVisible: 5
                    }).on('page', function(event, num){                   
                     
                    document.getElementById("loader").style.display = "block";
                    $('#user_reviews').load("fetch_reviews.php?page="+num+"&book_id="+<?php  echo $_GET['book_id']; ?>, function(response, status, xhr) {
                        if ( status == "error" ) {
                            alert("Error occured: " + xhr.status + " " + xhr.statusText );
                        } else {                            
                            document.getElementById("loader").style.display = "none";                            
                        }

                    });
                });
            </script>
        </section>
        
        <!--FOOTER-->
        <?php include 'footer.php'; ?>
        
    </body>
</html>