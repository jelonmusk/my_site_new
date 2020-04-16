<?php
    require '../session.php';
?>

<?php
    $msg="";
    if(isset($_POST['edit_id'])){
        
        require '../connect.php';
        
        $sql = "SELECT * FROM books WHERE id = $_POST[edit_id]";
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
            }
            
        }
        else
        {            
            $valid=0;
        }
        
    }
    else
    {
        header("location: manage.php");  
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
            <p class="heading">Edit Book</p>
            <form action="edit_update.php" method="post" enctype="multipart/form-data" id="edit_form">
                <div class="row">                    
                    <div class="col-md-4 my-auto">                        
                        <?php                        
                            $encoded_image = base64_encode($cover);
                            $image = "<img src='data:image/jpeg;base64,{$encoded_image}' width=245  height=405>";
                            echo $image;
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <label for="update_id">Book ID</label>
                            <input type="text" class="form-control" id="update_id" placeholder="Book ID" name="update_id" value="<?php echo $id; ?>" readonly>                        
                        </div>
                        <div class="row">
                            <label for="book_title">Book Title</label>
                            <input type="text" class="form-control" id="book_title" placeholder="Book Title" name="book_title" value="<?php echo $title; ?>">                        
                        </div>
                        <div class="row">
                            <label for="book_author">Book Author</label>
                            <input type="text" class="form-control" id="book_author" placeholder="Book Author" name="book_author" value="<?php echo $author; ?>">
                        </div>
                        <div class="row">
                            <label for="genre_id">Genre</label>
                            <select id="genre_id" class="form-control" name="genre_id">
                                <?php
                                    $sql = "SELECT id, name FROM genre";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                        if($row['id']==$genre_id)
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
                        <label for="publisher">Publisher</label>
                        <select id="publisher" class="form-control" name="publisher">
                            <?php
                                $sql = "SELECT id, name FROM publisher";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    if($row['id']==$pub_id)
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
                        <label for="edition">Edition</label>
                        <input type="text" class="form-control" id="edition" placeholder="Edition" name="edition" value="<?php echo $edition; ?>">
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
                        <p>Cover Image (Resolution: Height: 475, Width: 315 Format: JPG)</p>
                        <div class="custom-file">                            
                            <input type="file" class="custom-file-input" id="cover"  accept=".jpg" name="cover">
                            <label class="custom-file-label" for="cover">Choose Cover Image</label>
                        </div>
                    </div>
                </div>
                
                
                
                <button type="submit" class="btn btn-primary" style="margin-top:25px;">Submit</button>
            </form>
            <div class="container" id="alert" style="display:none;">
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                      Entered ID doesn't exist  in the Database. Click <a href='manage.php'>here to go back</a>
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