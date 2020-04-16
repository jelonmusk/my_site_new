<?php
    include '../session.php';
?>

<?php
    $msg= "";
    if( isset($_POST['itemid']) ){
        /*echo ($_FILES['cover']['name']);*/
//        $pic_data = addslashes(file_get_contents($_FILES['cover']['name']));        
        
        $sql = "INSERT INTO stocks ( item_id ,quantity)
            VALUES ('$_POST[itemid]','$_POST[quantity]')";
            if ($conn->query($sql) === TRUE) {
                sleep(2);
                $msg="Stock added successully";
            } 
            else {
                $msg="Couldn't add Stock";
                echo("Error description: " . mysqli_error($conn));
            }        
    } 
?>
<style>
    .heading{
        font-size:22px;
        font-weight:600;
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
                    <p class="heading">Add Stock</p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">                
                            <div class="col-md-6">
                                <label for="itemid">Item ID </label>
                                <input type="text" class="form-control" id="itemid" placeholder="Item ID" name="itemid">
                            </div>
                            <div class="col-md-6">
                                <label for="quantity">Quantity </label>
                                <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
                            </div>
                        </div>
                   
                <button type="submit" class="btn btn-primary" style="margin-top:25px;">Submit</button>
                </form>            
            </div>
      
  </body>
</html>