<?php
    require '../session.php';
?>
<?php
    $msg="";
    if(isset($_POST['edits_id'])){
        
        require '../connect.php';
        
        $sql = "SELECT * FROM stocks WHERE id = $_POST[edits_id]";
		$result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
			while($row = $result->fetch_assoc()) {
            
                $id = $row["id"];
                $item_id=$row["item_id"];
                $quantity=$row["quantity"];
            }
            
        }
        else
        {
            $valid=0;
        }
        
    }
    else
    {
        header("location: managese.php");  
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
</style


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
            <p class="heading">Edit Stock</p>
            <form action="edit_updatese.php" method="post" enctype="multipart/form-data" id="edit_form">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="update_id">Stock ID</label>
                                <input type="text" class="form-control" id="update_id" placeholder="Stock ID" name="update_id" value="<?php echo $id; ?>" readonly>
                        
                            </div>
                            <div class="col-md-6">
                                <label for="item_id">Item ID</label>
                                <input type="text" class="form-control" id="item_id" placeholder="Item ID" name="item_id" value="<?php echo $item_id; ?>">
                        
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6">    
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value="<?php echo $quantity; ?>">
                        
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary" style="margin-top:25px;">Submit</button>
            </form><div class="container" id="alert" style="display:none;">
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                      Entered ID doesnt exist  in the Database. Click <a href='managese.php'>here to go back</a>
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
  </body>
</html>