<?php
    require '../session.php';
?>

<?php
    $msg="";
    if(isset($_POST['edit_id'])){
        
        require '../connect.php';
        
        $sql = "SELECT * FROM e_stuff WHERE id = $_POST[edit_id]";
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
                $discount = $row["discount"];
                $man_id = $row["man_id"];
                $version = $row["version"];
                $new = $row["new"];
                $image = $row["image"];
            }
            
        }
        else
        {            
            $valid=0;
        }
        
    }
    else
    {
        header("location: managee.php");  
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
            <p class="heading">Edit Item</p>
            <form action="edit_updatee.php" method="post" enctype="multipart/form-data" id="edit_form">
                <div class="row">                    
                    <div class="col-md-4 my-auto">                        
                        <?php                        
                            $encoded_image = base64_encode($image);
                            $images = "<img src='data:image/jpeg;base64,{$encoded_image}' width=245  height=405>";
                            echo $images;
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <label for="update_id">Item ID</label>
                            <input type="text" class="form-control" id="update_id" placeholder="Item ID" name="update_id" value="<?php echo $id; ?>" readonly>                        
                        </div>
                        <div class="row">
                            <label for="specification">Specification</label>
                            <input type="text" class="form-control" id="specification" placeholder="Specification" name="specification" value="<?php echo $specification; ?>">                        
                        </div>
                        <div class="row">
                            <label for="">Item</label>
                            <input type="text" class="form-control" id="item" placeholder="Item Name" name="item" value="<?php echo $item; ?>">
                        </div>
                        <div class="row">
                            <label for="type_id">Type</label>
                            <select id="type_id" class="form-control" name="type_id">
                                <?php
                                    $sql = "SELECT id, name FROM type";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                        if($row['id']==$type_id)
                                        {
                                            echo "<option value=$row[id] selected>$row[name]</option>";
                                        }
                                        else
                                        {
                                            echo "<option value=$row[id]>$row[name]</option>";
                                        }                                    
                                    }
                                ?>                            
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">                    
                    <div class="col-md-6">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Price" name="price" value="<?php echo $price; ?>">
                    </div>  
                    <div class="col-md-6">
                        <label for="discount">Discount</label>
                        <select id="discount" class="form-control" name="discount">
                            <?php
                                $sql = "SELECT id, description FROM discount";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    if($row['id']==$discount)
                                    {
                                        echo "<option value=$row[id] selected>$row[description]</option>";
                                    }
                                    else
                                    {
                                        echo "<option value=$row[id]>$row[description]</option>";
                                    }                                    
                                }
                            ?>                             
                        </select>
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-md-6">
                        <label for="manufacturer">Manufacturer</label>
                        <select id="manufacturer" class="form-control" name="manufacturer">
                            <?php
                                $sql = "SELECT id, name FROM manufacturer";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    if($row['id']==$man_id)
                                    {
                                        echo "<option value=$row[id] selected>$row[name]</option>";
                                    }
                                    else
                                    {
                                        echo "<option value=$row[id]>$row[name]</option>";
                                    }                                    
                                }
                            ?>                            
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="version">Version</label>
                        <input type="text" class="form-control" id="version" placeholder="Version" name="version" value="<?php echo $version; ?>">
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-md-6">
                        <label for="new">New/Old</label>
                        <select id="new" class="form-control" name="new">
                            <?php
                                if($new==1)
                                {
                                    echo "<option value=1 selected>New</option>";
                                    echo "<option value=0>Old</option>";
                                }
                                else
                                {
                                    echo "<option value=1>New</option>";
                                    echo "<option value=0 selected>Old</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <p>Product Image (Resolution: Height: 475, Width: 315 Format: JPG)</p>
                        <div class="custom-file">                            
                            <input type="file" class="custom-file-input" id="image"  accept=".jpg" name="image">
                            <label class="custom-file-label" for="image">Choose Item Image</label>
                        </div>
                    </div>
                </div>
                
                
                
                <button type="submit" class="btn btn-primary" style="margin-top:25px;">Submit</button>
            </form>
            <div class="container" id="alert" style="display:none;">
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                      Entered ID doesn't exist  in the Database. Click <a href='managee.php'>here to go back</a>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            var valid = <?php echo $valid;  ?>;
            if(valid==0)
                {
                    document.getElementById("edit_form").style.display = "none";
                    document.getElementById("alert").style.display = "block";
                }
                      
        </script>
    </body>
</html>