<?php
    require '../session.php';
?>

<?php
    $msg="";
    if(isset($_POST['edit_id'])){
        
        require '../connect.php';
        
        $sql = "SELECT * FROM user_details WHERE id = $_POST[edit_id]";
		$result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
			while($row = $result->fetch_assoc()) {
            
                
                $id = $row["id"];
                $user_id = $row["user_id"];
                $email = $row["email"];
                $mobile = $row["mobile"];
                $password = $row["password"];
                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                $address = $row["address"];
                $city = $row["city"];
                $state = $row["state"];
                $college_name = $row["college_name"];
            }
            
        }
        else
        {            
            $valid=0;
        }
        
    }
    else
    {
        header("location: manageu.php");  
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
            <p class="heading">Edit User</p>
            <form action="edit_updateu.php" method="post" enctype="multipart/form-data" id="edit_form">
                <div class="row">                    
                    
                    <div class="col-md-6">
                        <div class="row">
                            <label for="update_id"> ID</label>
                            <input type="text" class="form-control" id="update_id" placeholder=" ID" name="update_id" value="<?php echo $id; ?>" readonly>                        
                        </div>
                        <div class="row">
                             <label for="user_id">User ID</label>
                             <input type="text" class="form-control" id="user_id" placeholder="User ID" name="user_id" value="<?php echo $user_id; ?>" >                        
                        </div>
                        <div class="row">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email; ?>">
                        </div>
                       
                        
                        <div class="row">
                            <div class="col-md-6">
                                 <label for="mobile">Mobile</label>
                                <input type="number" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="<?php echo $mobile; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                 <input type="text" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $password; ?>"> 
                            </div>         
                        </div>
                        
                
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="<?php echo $first_name ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name">Last Name</label>
                                 <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="<?php echo $last_name; ?>"> 
                            </div>         
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="<?php echo $address; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="city">City</label>
                                 <!--<input type="text" class="form-control" id="city" placeholder="City" name="city" value=">"-->> 
                                
                                <select id="city" class="form-control" name="city">
                            <?php
                                require '../connect.php';
                                $sql = "SELECT city_id, city_name FROM cities,states  WHERE states.id=cities.state_id";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                ?>
                                    
                                <option value="<?php echo $row["city_id"];?>"><?php echo $row["city_name"];?></option>
                            <?php
                            }
                            ?>                            
                        </select>
                            </div>         
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="state">State</label>
                                <!--<input type="text" class="form-control" id="state" placeholder="State" name="state" value=">">-->
                                
                                <select id="state" class="form-control" name="state">
                            <?php
                                require '../connect.php';
                                $sql = "SELECT id, state FROM states";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                ?>
                                    
                                <option value="<?php echo $row["id"];?>"><?php echo $row["state"];?></option>
                            <?php
                            }
                            ?>                            
                        </select>
                            </div>
                            <div class="col-md-6">
                                <label for="college_name">College Name</label>
                                 <input type="text" class="form-control" id="college_name" placeholder="College Name" name="college_name" value="<?php echo $college_name; ?>"> 
                            </div>         
                        </div>
                
                    </div>
                </div>
                
                
                <button type="submit" class="btn btn-primary" style="margin-top:25px;">Submit</button>
            </form>
            <div class="container" id="alert" style="display:none;">
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                      Entered ID doesn't exist  in the Database. Click <a href='manageu.php'>here to go back</a>
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