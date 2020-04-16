<style>
    .form_left
    {
        background-image: url(assets/reg_form.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form_left_text
    {
        text-align:center;
        font-family:'Playfair Display';
        font-weight:600;
        font-size:60px;
        color:white;
    }
    
    .reg_form .row
    {
        padding-top:20px;
        padding-bottom: 20px;
    }    
     
    .header-title
    {
        margin: 5rem 0;
    }
    h1
    {
        font-size: 31px;
        line-height: 40px;
        font-weight: 600;
        color:#4c5357;
    }
    h2
    {
        color: #5e8396;
        font-size: 21px;
        line-height: 32px;
        font-weight: 400;
    }
    
    /*FOR MOBILE SCREENS*/
    @media only screen and (max-width: 768px) {
        .reg_form .col-md-6
        {
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .reg_form .row
        {
            padding-top: 0px;
            padding-bottom: 0px;
        }
    }
</style>

<?php
    
    $conn_id = 5;
    
    include 'connect.php';
    if(isset($_POST['first_name']))
    {
        $sql = "INSERT INTO user_details (first_name, last_name, email, password,address, college_name ,state , city, user_id, mobile)
            VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[email]', '$_POST[password]', '$_POST[address]','$_POST[college_name]','$_POST[city]','$_POST[state]','$_POST[user_id]', '$_POST[mobile]')";
            if ($conn->query($sql) === TRUE) {            
                header("location: email_verification.php?email=".$_POST[email]);
            }
            else
            {
                echo("Error description: " . mysqli_error($conn));
            }
    }
    else
    {
       /*echo "NOT SET";*/
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
        
        <!--GOOGLE FONTS-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
        
        <!--MAIN CSS-->
        <link rel="stylesheet" href="css/main.css">
        
        <!--ICON & TITLE-->
        <link rel="icon" href="assets/icon.png">
        <title>Books Online</title>
        
        <!--FONTAWESOME-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                
        
        <div class="container-fluid">
            <div class="row" style="height:100vh;">
                <!--LEFT IMAGE-->
                <div class="col-md-4 form_left">
                    <p class="form_left_text">Meet your next favourite book.<br>
                    <span  style="font-family:'Playfair Display'; font-size:22px; text-align:center; color:white;">New here? Create a free account!</span>
                    </p>
                </div>
                <!--RIGHT REG FORM-->
                <div class="col-md-8">                  
                    <div class="col-md-6 mx-auto text-center">
                        <div class="header-title">
                        <h1 class="wv-heading--title">
                        Check out — it’s free!
                        </h1>
                        <h2 class="wv-heading--subtitle">
                        Confirm you're a student.
                        </h2>
                        </div>
                    </div>
                    
                    <div class="row  d-flex justify-content-center reg_form">
                        <form method="post"  action="" class="w-100" style="padding-left:50px;padding-right:50px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" aria-describedby="first_name" name="first_name" placeholder="Enter first name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" aria-describedby="last_name" name="last_name" placeholder="Enter last name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Email ID</label>
                                    <input type="text" class="form-control" id="email" aria-describedby="email" name="email" placeholder="Enter Email ID" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" aria-describedby="password" name="password" placeholder="Enter Password" required>
                                    <div class="alert alert-danger" role="alert" id="pass_msg" style="display:none; margin-top:20px;">
                                    Password must contain mimimum 8 characters. Atleast one uppercase, one lowercase and one number.
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" aria-describedby="address" name="address" placeholder="Enter Address" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="college_name">College Name</label>
                                    <input type="text" class="form-control" id="college_name" aria-describedby="college_name" name="college_name" placeholder="Enter College Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="state">State</label>
                                    <!--<input type="text" class="form-control" id="state" aria-describedby="state" name="state" placeholder="Enter State" required>-->
                                    <select id="state" class="form-control" name="state" required>
                                        
                                    <?php
                                        $conn_id=5;
                                        require 'connect.php';
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
                                    <label for="city">City</label>
                                    <!--<input type="city" class="form-control" id="city" aria-describedby="city" name="city" placeholder="Enter City" required>-->
                                    <select id="city" class="form-control" name="city" required>
                                    <?php
                                        $conn_id=5;
                                        require 'connect.php';
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
                                    <label for="user_id">User ID</label>
                                    <div class="input-group mb-3">                                        
                                        <input type="text" class="form-control" id="user_id" aria-describedby="user_id" name="user_id" placeholder="Pick a User ID" required>
                                        <div class="input-group-append">                                            
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="check_user()">Check Availability</button>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" maxlength="10" pattern="\d{10}"  class="form-control" id="mobile" aria-describedby="mobile" name="mobile" placeholder="Enter Mobile Number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="small mt-3">Already Registered? <a href="sign_in.php">Sign In</a>.</p>
                                    <p class="small mt-3">By signing up, you are indicating that you have read and agree to the <a href="#" class="ps-hero__content__link">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
                                </div>
                            </div>
                            <div class="row justify-content-center w-100">                                
                                <button type="submit" class="btn btn-primary">Create Your Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            
            /*Display/remove message on password input*/
            password.onfocus = function() 
            {
                document.getElementById("pass_msg").style.display = "block";
            }
            password.onblur = function()
            {
                document.getElementById("pass_msg").style.display = "none";
            }
            
            //PASSWORD VALIDATION            
            password.onkeyup = function() 
            {
                var lowerCaseLetters = /[a-z]/g;
                var upperCaseLetters = /[A-Z]/g;
                var numbers = /[0-9]/g;
                if(password.value.match(lowerCaseLetters) && password.value.match(upperCaseLetters) && password.value.match(numbers) && password.value.length >= 8)
                    {
                        pass_msg.classList.remove("alert-danger");
                        pass_msg.classList.add("alert-success");
                    }
                else
                    {
                        pass_msg.classList.remove("alert-success");
                        pass_msg.classList.add("alert-danger");
                    }
            }
            
            
            /*USERNAME CHECK*/            
            function check_user() {
                var user_id = $("#user_id").val();
                
                dataString = user_id;

                $.ajax({
                type: "POST",
                url: "check_user.php",
                data: {data : dataString}, 
                cache: false,

                success: function(result) { //just add the result as argument in success anonymous function
                    var returnedvalue = result;
                    /*alert(returnedvalue);*/
                    if(returnedvalue == "true")
                        {
                            alert("User ID is already taken. Please try a different one.")
                        }
                    else
                        {
                            alert("User ID Available. Please Continue.");
                        }
                }
                });
            }
        </script>
        
    </body>
</html>