<?php
    $conn_id=2;
    include('../connect.php');

    $limit = 6;  
    
    /*GET THE CURRENT PAGE NUM FROM GET LINK*/
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
    $start_from = ($page-1) * $limit;

    /*FETCH  BOOKS WITHIN LIMIT*/
    $sql = "SELECT * FROM e_stuff LIMIT $start_from, $limit";  
    $rs_result = mysqli_query($conn, $sql);
    
    $count=1;
    while($row = $rs_result->fetch_assoc()) 
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
//        $cover = $row["cover"];

        $encoded_image = base64_encode($image);
        $images = "<a href='view_prod.php?prod_id=$id'><img src='data:image/jpeg;base64,{$encoded_image}' class='cover_image' width=215  height=375></a>";


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
        /*DISPLAY BOOKS*/
        echo $col;

       $count++;
    }
?>