<?php
    require '../session.php';
?>


<?php
    $msg= "";
    if( isset($_POST['item']) ){
        /*echo ($_FILES['cover']['name']);*/
        $pic_data = addslashes(file_get_contents($_FILES['image']['name']));        
        
        $sql = "INSERT INTO e_stuff (item, specification, type_id, price, discount, man_id, version, new, image)
            VALUES ('$_POST[item]', '$_POST[specification]', '$_POST[type_id]', '$_POST[price]'
            , '$_POST[discount]', '$_POST[manufacturer]', '$_POST[version]', '$_POST[new]', '$pic_data')";
            if ($conn->query($sql) === TRUE) {
                sleep(2);
                $msg="Product added successully";
            } 
            else {
                $msg="Couldn't add product";
                echo("Error description: " . mysqli_error($conn));
            }        
    } 
?>

<style>
    .heading
    {
        font-size:22px;
    }
    .row
    {
        padding-top: 20px;
        padding-bottom: 20px;
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
        
        <?php include '../header.php' ?>
        
        <div class="container" style="margin-top:50px;">
            <p class="heading" style="margin:0 auto;"><?php echo $msg; ?></p>
            <p class="heading">Add Item</p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">                
                    <div class="col-md-6">
                        <label for="item">Item</label>
                        <input type="text" class="form-control" id="item" placeholder="Item Name" name="item">
                    </div>
                    <div class="col-md-6">
                        <label for="version">Version</label>
                        <input type="text" class="form-control" id="version" placeholder="Version" name="version">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="type_id">Type</label>
                        <select id="type_id" class="form-control" name="type_id">
                            <?php
                                require '../connect.php';
                                $sql = "SELECT id, name FROM type";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                ?>
                                    
                                <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
                            <?php
                            }
                            ?>                            
                        </select>    
                    </div>
                    <div class="col-md-6">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Price" name="price">
                    </div>                
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="discount">Discount</label>
                        <select id="discount" class="form-control" name="discount">
                            <?php
                                require '../connect.php';
                                $sql = "SELECT id, description FROM discount";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                ?>
                                    
                                <option value="<?php echo $row["id"];?>"><?php echo $row["description"];?></option>
                            <?php
                            }
                            ?>                            
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="manufacturer">Manufacturer</label>
                        <select id="manufacturer" class="form-control" name="manufacturer">
                            <?php
                                require '../connect.php';
                                $sql = "SELECT id, name FROM manufacturer";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                ?>
                                    
                                <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
                            <?php
                            }
                            ?>                            
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="specification">Specification</label>
                        <input type="text" class="form-control" id="specification" placeholder="Specification" name="specification">
                    </div>
                    <div class="col-md-6">
                        <label for="new">New/Old</label>
                        <select id="new" class="form-control" name="new">
                            <option value="1" selected>New</option>
                            <option value="0">Old</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Product Image (Resolution: Height: 475, Width: 315 Format: JPG)</p>
                        <div class="custom-file">                            
                            <input type="file" class="custom-file-input" id="image"  accept=".jpg" name="image">
                            <label class="custom-file-label" for="image">Choose Product Image</label>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary" style="margin-top:25px;">Submit</button>
            </form>            
        </div>
    </body>
</html>