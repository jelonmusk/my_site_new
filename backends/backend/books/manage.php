<?php
    include '../session.php';
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
        
        <!--FONTAWESOME CSS-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        <title>My Site</title>
    </head>
    
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <?php include '../header.php'; ?>
        
        <div class="container" style="margin-top:100px;">
            
            <!--SEARCH BAR-->
            <div class="row">
                <div class="col-md-12" >
                    <form action="" method="post" autocomplete="on">
                        <p class='heading'>Search</p>
                        <div class="row" style="padding-left:15px; padding-right:15px;">
                            <div class="input-group mb-3">
                                <div class="input-group-append">                                    
                                    <select class="form-control" id="exampleFormControlSelect1" name="search_for" value="1">
                                      <option value="1" <?php if (isset($_POST['search_for']) && $_POST['search_for']=="1") echo "selected";?> >ID</option>
                                      <option value="2" <?php if (isset($_POST['search_for']) && $_POST['search_for']=="2") echo "selected";?> >Title</option>
                                      <option value="3" <?php if (isset($_POST['search_for']) && $_POST['search_for']=="3") echo "selected";?> >Publisher ID</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Search Query" aria-label="Recipient's username" aria-describedby="basic-addon2" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>                          
                    </form>
                </div>
            </div> 
            
            <!--ADD,EDIT,DELETE-->
            <div class="row">
                <div class="col-md-4">
                    <p class="heading">Add Book</p>
                    <a class="btn btn-primary" href="add.php" role="button">Add Book</a>
                </div>
                <div class="col-md-4">
                    <form action="edit.php" method="post" autocomplete="on">
                        <p class="heading">Edit Book</p>
                        <div class="row" style="padding-left:15px; padding-right:15px;">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Book ID" aria-label="Recipient's username" aria-describedby="basic-addon2" name="edit_id">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>                          
                    </form>
                </div>
                <div class="col-md-4">
                    <form action="delete.php" method="post" autocomplete="on">
                        <p class="heading">Delete Book</p>
                        <div class="row" style="padding-left:15px; padding-right:15px;">
                            <div class="input-group mb-3">                                
                                <input type="number" class="form-control" placeholder="Book ID" aria-label="Recipient's username" aria-describedby="basic-addon2" name="delete_id">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>                          
                    </form>
                </div>   
            </div>        
        </div>
        
        <!--DATABASE TABLE-->        
        <div class="container-fluid">            
            <div class="row">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>                      
                      <th scope="col">Title</th>
                      <th scope="col">Genre</th>
                      <th scope="col">Edition</th>
                      <th scope="col">Price</th>
                      <th scope="col">Publisher ID</th>
                      <th scope="col">Discount ID</th>
                      <th scope="col">New/Old</th>                        
                      <th scope="col">View</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                        require '../connect.php';
                        if( isset($_POST['search']) )
                        {
                            $search_for= $_POST['search_for'];
                            $search= $_POST['search'];
                            if($search_for==1)
                            {
                                $sql = "SELECT * FROM books WHERE (`id` LIKE '%".$search."%')";
                            }
                            else if($search_for==2)
                            {
                                $sql = "SELECT * FROM books WHERE (`title` LIKE '%".$search."%')";
                            }
                            else if($search_for==3)
                            {
                                $sql = "SELECT * FROM books WHERE (`pub_id` LIKE '%".$search."%')";
                            }
                            
                            
                        }
                        else
                        {
                            $sql = "SELECT * FROM books ORDER BY id";    
                        }

                        $result = $conn->query($sql);
                        $count=0;
                        while($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row["id"];?></td>
                            <td><?php echo $row["title"];?></td>
                            <td><?php echo $row["genre_id"];?></td>                            
                            <td><?php echo $row["edition"];?></td>                            
                            <td><?php echo $row["price"];?></td>
                            <td><?php echo $row["pub_id"];?></td>
                            <td><?php echo $row["discount"];?></td>        
                            <?php
                                if($row["new"])
                                {                                    
                                    echo "<td>New</td>";
                                }
                                else
                                {
                                    echo "<td>Old</td>";
                                }                            
                            ?>                            
                            <td>
                                <form action="view.php" class="col s12" method="post">
                                        <button style='margin-top:5px; background:none; border:none;' type="submit" name="view_id" value="<?php echo $row["id"] ?>">
                                            <i class="fa fa-eye" ></i>
                                        </button>
                                </form>                        
                            </td>                            
                        </tr>
                    <?php
                        $count++;
                    }                
                    ?>                   
                    
                  </tbody>
                </table>  
                
                <p style="font-size:20px; margin:25px auto;">Total Records found: <?php echo $count;  ?></p>
            </div>
            
        
        </div>

    </body>
</html>