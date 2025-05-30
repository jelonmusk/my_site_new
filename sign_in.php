<?php
    $alert="";    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $conn_id=5;
        require 'connect.php';
        $myemail = mysqli_real_escape_string($conn,$_POST['email']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
        
        $sql = "SELECT id FROM user_details WHERE email = '$_POST[email]' and password = '$_POST[password]'";
        $result = mysqli_query($conn,$sql);        
        $count = mysqli_num_rows($result);
        if($count==1)
        {
            /*EMAIL AND PASSWORD MATCH*/
            /*SETTING SEEION VARIABLE*/
            session_start();
            $_SESSION['login_email'] = $myemail;     
            
            /*CHECKING IF REMEMBER ME IS ON*/
            if(isset($_POST['remember']))
            {
                /*IF REMEMBER IS ON*/
                /*SETTING COOKIE FOR 1 DAY*/
                setcookie("login_email", $myemail, time()+1*24*60*60);
                header("location: index.php");
                
            }
            else
            {
                /*REDIRECTING THE USER TO INDEX.PHP*/
                header("location: index.php");
            }
        }
        else
        {
            $alert = <<<EOT
            <div class="form-group">
                <p style="font-size:16px;" class="text-danger">Your Username or Password is invalid.</p>
            </div>
EOT;
        }
    }
?>

<style>
    body 
    {        
        background-image: url(assets/texture.jpg);
        background-repeat: repeat-x repeat-y;
    }
    .login_wrap
    {
        background: #EEE;
        border-radius: 10px;
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
        
        <!--GOOGLE FONTS-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
        
        <!--MAIN CSS-->
        <link rel="stylesheet" href="css/main.css">
        
        <!--ICON & TITLE-->
        <link rel="icon" href="assets/icon.png">
        <title>Books Online</title>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <!--LOGIN FORM-->
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-4 mx-auto d-flex justify-content-center align-items-center">
                    <div  class="container">
                        <div class="row">
                            <p style="font-family:Playfair Display; font-size:35px; font-weight:600;  text-align:center; padding-top:0px; width:100%;">Welcome to My Site</p>
                        </div>
                        <div class="row">
                            <p style="font-family:Playfair Display; font-size:25px; font-weight:600;  text-align:center; padding-top:0px; width:100%;">Find the book that's right for you.</p>
                        </div>                    
                    </div>
                </div>
                <div class="col-md-8 mx-auto d-flex justify-content-center align-items-center">
                    <div class="col-md-6 login_wrap mx-auto">
                        <p style="font-family:Playfair Display; font-size:26px; font-weight:600;  text-align:center; padding-top:50px; padding-bottom:0px;">Sign in to My Site</p>
                        <form action="" method="post" style="padding:40px 30px;">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email ID" name="email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            ...
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <?php
                                echo $alert;
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="small mt-2">New here? <a href="register.php">Sign Up</a>.</p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 mb-0">Submit</button>
                        </form>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
        <!--FOOTER-->
        <?php include 'footer.php'; ?>
    </body>
</html>