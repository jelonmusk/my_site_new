<?php
    require '../connect.php';
    require '../session.php';

    if(isset($_POST['view_id']))
    {
        $sql = "SELECT * FROM user_details WHERE id = $_POST[view_id]";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
			while($row = $result->fetch_assoc()) {
            
                $id = $row["id"];
                $user_id = $row["user_id"];
                $email = $row["email"];
                $mobile = $row["mobile"];;
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
            header("location:  manageu.php");
        }
        
        
    }
    else
    {
        header("location: manageu.php"); 
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
                        <div class="col-md-4">
                            <p class="heading">User ID</p>
                            <p class="text"><?php echo $user_id;?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="heading">Email</p>
                            <p class="text"><?php echo $email;?></p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <p class="heading">Mobile</p>
                            <p class="text"><?php echo $mobile;?></p> 
                        </div>
                        <div class="col-md-4">
                            <p class="heading">Password</p>
                            <p class="text"><?php echo $password;?></p> 
                        </div>
                    </div>   
                    
                    <div class="row">
                        <div class="col-md-4">
                            <p class="heading">First Name</p>
                            <p class="text"><?php echo $first_name;?></p> 
                        </div>
                        <div class="col-md-4">
                            <p class="heading">Last Name</p>
                            <p class="text"><?php echo $last_name;?></p>                     
                        </div>                    
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <p class="heading">Address</p>                            
                            <p class="text"><?php echo $address;?></p> 
                        </div>
                        <div class="col-md-4">
                            <p class="heading">City</p>
                            <p class="text"><?php echo $city;?></p>
                                                
                        </div>                    
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <p class="heading">State</p>                            
                            <p class="text"><?php echo $state;?></p> 
                        </div>
                        <div class="col-md-4">
                            <p class="heading">College Name</p>
                            <p class="text"><?php echo $college_name;?></p>
                        </div>                    
                    </div>
                    
                </div>
            </div>
        </div>

    </body>
</html>