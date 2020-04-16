<?php
    require '../connect.php';
    require '../session.php';

    if(isset($_POST['view_id']))
    {
        $sql = "SELECT * FROM e_stuff WHERE id = $_POST[view_id]";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
			while($row = $result->fetch_assoc()) {
            
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
            }
            
        }        
        else
        {
            header("location:  managee.php");
        }
        
        
    }
    else
    {
        header("location: managee.php"); 
    }

?>

<style>
    .heading{
        font-size: 22px;
        font-weight: 400;
        text-decoration: underline;
        color: #424242;
    }
    .text{
        font-size: 18
    }
    .text_field{
        /*border-radius: 5px;
        border: solid;*/
    }
</style>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>My Site</title>
    </head>
    
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <?php
            include '../header.php';
        ?>
        
        <div class="container" style="margin-top:50px;">
            <div class="row">
                <div class="col-md-8 text_field">
                    <div class="row">
                        <div class="col">
                            <p class="heading">Item</p>
                            <p class="text"><?php echo $item;?></p> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="heading">Specification</p>
                            <p class="text"><?php echo $specification;?></p> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="heading">Type</p>
                            <?php
                                $sql = "SELECT * FROM type WHERE id = $type_id";
                                $result = $conn->query($sql);
                                $count = mysqli_num_rows($result);
                                if($count > 0)
                                {
                                    while($row = $result->fetch_assoc()) {

                                        $type = $row["name"];
                                    }

                                }
                            ?>
                            <p class="text"><?php echo $type;?></p> 
                        </div>
                        <div class="col-md-4">
                            <p class="heading">Price</p>
                            <p class="text"><?php echo $price;?></p> 
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-4">
                            <p class="heading">Discount</p>
                            <?php
                                $sql = "SELECT * FROM discount WHERE id = $discount_id";
                                $result = $conn->query($sql);
                                $count = mysqli_num_rows($result);
                                if($count > 0)
                                {
                                    while($row = $result->fetch_assoc()) {

                                        $discount = $row["description"];
                                    }

                                }
                            ?>
                            <p class="text"><?php echo $discount;?></p> 
                        </div>
                        <div class="col-md-4">
                            <p class="heading">Publisher</p>
                            <?php
                                $sql = "SELECT * FROM manufacturer WHERE id = $man_id";
                                $result = $conn->query($sql);
                                $count = mysqli_num_rows($result);
                                if($count > 0)
                                {
                                    while($row = $result->fetch_assoc()) {

                                        $manufacturer = $row["name"];
                                    }

                                }
                            ?>
                            <p class="text"><?php echo $manufacturer;?></p>                     
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="heading">Version</p>                            
                            <p class="text"><?php echo $version;?></p> 
                        </div>
                        <div class="col-md-4">
                            <p class="heading">New/Old</p>
                            <?php
                                if($new==1)
                                {
                                    echo "<p class='text'>New</p>";
                                }
                                else
                                {
                                    echo "<p class='text'>Old</p>";
                                }
                            ?>
                                                
                        </div>                    
                    </div>
                </div>
                
                
                
                <div class="col-md-4 my-auto">
                    <?php                        
                        $encoded_image = base64_encode($image);
                        $images = "<img src='data:image/jpeg;base64,{$encoded_image}' width=245  height=405>";
                        echo $images;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>