<?php
    $conn_id=1;
    include('connect.php');

    $limit = 6;  
    
    /*GET THE CURRENT PAGE NUM FROM GET LINK*/
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
    $start_from = ($page-1) * $limit;

    /*FETCH  BOOKS WITHIN LIMIT*/
    $sql = "SELECT * FROM books LIMIT $start_from, $limit";  
    $rs_result = mysqli_query($conn, $sql);
    
    $count=1;
    while($row = $rs_result->fetch_assoc()) 
    {
        $id = $row["id"];
        $author = $row["author"];
        $title = $row["title"];
        $genre_id = $row["genre_id"];
        $price = $row["price"];
        $discount_id = $row["discount"];
        $pub_id = $row["pub_id"];
        $edition = $row["edition"];
        $new = $row["new"];
        $cover = $row["cover"];

        $encoded_image = base64_encode($cover);
        $image = "<a href='view_book.php?book_id=$id'><img src='data:image/jpeg;base64,{$encoded_image}' class='cover_image' width=215  height=375></a>";


        $col = <<<EOT
        <div class="col-md-4">
            <div class="row image">
                $image
            </div>
            <div class="row title">
                <p data-toggle="title p" data-placement="top" title="$title">
                $title
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