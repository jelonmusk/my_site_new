<?php
    require  '../connect.php';    
    $sql = "SELECT cover FROM books WHERE id=22";

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
       $image = $row["cover"];
        
        $encoded_image = base64_encode($image);
        //You dont need to decode it again.

        $Hinh = "<img src='data:image/jpeg;base64,{$encoded_image}'>";

        //and you echo $Hinh
        echo $Hinh;
    }
?>