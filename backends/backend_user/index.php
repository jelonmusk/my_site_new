<?php
    require "connect.php";
    session_start();
    $error = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $myusername = mysqli_real_escape_string($conn,$_POST['username']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
        
        $sql = "SELECT id FROM superuser WHERE user_id = '$_POST[username]' and password = '$_POST[password]'";
        $result = mysqli_query($conn,$sql);        
        $count = mysqli_num_rows($result);
        if($count==1)
        {
            
            $_SESSION['login_user'] = $myusername;
            header("location: dashboard.php");
        }
        else
        {
            $error = "Your Username or Password is invalid. Please try again.";
        }
    }
        

?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>My Site</title>
    </head>
    
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        
        
        <div class="container">
            <ceter><p style="font-size: 22px; margin-top: 100px; text-align:center;">Welcome to My Site</p></ceter>
            <form method="post" action="" style="width:350px; margin:0 auto; margin-top:50px;">            
              <div class="form-group">
                  <p> <?php echo $error; ?> </p>
                <label for="exampleInputEmail1">User ID</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter User ID" name="username">                
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Enter Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
              </div>              
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
    
</html>