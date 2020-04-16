<?php
    session_start();    
    if(isset($_SESSION['login_email']))
    {        
        $conn_id=5;
        require 'connect.php';
        $sql = "SELECT * FROM user_details WHERE email = '$_SESSION[login_email]'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        $pass="";
        if($count > 0)
        {
            while($row = $result->fetch_assoc()) 
            {                
                $id = $row["id"];
                $user_id = $row["user_id"];
                $email = $row["email"];
                $mobile = $row["mobile"];
                $password = $row["password"];
                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                $address = $row["address"];
                $city_id = $row["city"];
                $state_id = $row["state"];
                $college_name = $row["college_name"];
            }

        }

        $num = strlen($password);
        for($i=1;$i<=$num;$i++)
        {
            $pass = $pass."•";
        }

        $sql = "SELECT * FROM states WHERE id = '$state_id'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
            while($row = $result->fetch_assoc()) 
            {                             
                $state = $row["state"];
            }

        }
        $sql = "SELECT * FROM cities WHERE city_id = '$city_id'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
            while($row = $result->fetch_assoc()) 
            {                             
                $city = $row["city_name"];
            }

        }



    }
    else
    {        
        header("location: index.php");
    }

?>


<style>
    .user_profile .personal_wrap
    {
        background-color: #fce4ec;
        border-radius: 10px;
        padding-top: 50px;
        padding-bottom: 50px;
    }
    .user_profile .personal_wrap .row:not(last)
    {
        padding-bottom: 25px;
    }
    .user_profile .account_info_wrap
    {
        background-color: #e8eaf6;
        border-radius: 10px;
        padding-top: 50px;
        padding-bottom: 50px;
    }
    .user_profile .account_info_wrap .row:not(last)
    {
        padding-bottom: 25px;
    }
    .user_profile .settings_wrap
    {
        background-color: #dcedc8;
        border-radius: 10px;
        padding-top: 50px;
        padding-bottom: 50px;
    }
    .user_profile .settings_wrap .row:not(last)
    {
        padding-bottom: 25px;
    }
    .user_profile .heading
    {
        font-weight:600;
        font-size: 22px;
    }
    .user_profile .text
    {
        font-size: 20px;
    }
    .user_profile .edit_btn
    {
        text-decoration: none;
        color: #757575;
        transition: 0.7s;
    }
    .user_profile .edit_btn:hover
    {
        color:#000;
    }
</style>

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

        <!--FONTAWESOME-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!--NAVBAR-->
        <?php include 'header.php'; ?>
        
        <section class="user_profile" style="margin-top:125px; margin-bottom:75px;">            
            <div class="container">
                <div class="row">
                    <div class="col-3" id="vert_tab">
                        <div class="nav flex-column nav-pills" id="navigation" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-personal-tab" data-toggle="pill" href="#v-pills-personal" role="tab" aria-controls="v-pills-personal" aria-selected="true">Personal Information</a>
                            <a class="nav-link" id="v-pills-account-tab" data-toggle="pill" href="#v-pills-account" role="tab" aria-controls="v-pills-account" aria-selected="false">Account Information</a>
                            <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                        </div>
                    </div>

                    <div class="col-9" id="vert_content">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-personal" role="tabpanel" aria-labelledby="v-pills-personal-tab">
                                <div class="row personal_wrap">
                                    <div class="col-md-10 mx-auto">
                                        <div class="row">

                                            <div class="col-md-12"  style="display:flex; justify-content:flex-end; align-items:center;">
                                                <a  class="edit_btn" href="#"><span style="margin-right:10px;"><i class="fa fa-pencil"></i></span>Edit Personal Info</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="heading">First Name</p>
                                                <p class="text"><?php echo $first_name; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="heading">Last Name</p>
                                                <p class="text"><?php echo $last_name; ?></p>
                                            </div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="heading">Address</p>
                                                <p class="text"><?php echo $address; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="heading">State</p>
                                                <p class="text"><?php echo $state; ?></p>
                                            </div>
                                        </div>
                                        <div class="row last">
                                            <div class="col-md-6">
                                                <p class="heading">District</p>
                                                <p class="text"><?php echo $city; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="heading">College Name</p>
                                                <p class="text"><?php echo $college_name; ?></p>
                                            </div>
                                        </div>                                        
                                    </div>                                    
                                </div>                            
                            </div>
                            <div class="tab-pane fade" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">
                                <div class="row account_info_wrap">
                                    <div class="col-md-10 mx-auto">
                                        <div class="row">
                                            <div class="col-md-12"  style="display:flex; justify-content:flex-end; align-items:center;">
                                                <a  class="edit_btn" href="#"><span style="margin-right:10px;"><i class="fa fa-pencil"></i></span>Edit Account Info</a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="heading">Email Address</p>
                                                <p class="text"><?php echo $email; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="heading">Mobile Number</p>
                                                <p class="text"><?php echo $mobile; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="heading">User ID</p>
                                                <p class="text"><?php echo $user_id; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="heading">Password</p>
                                                <p class="text"><?php echo $pass; ?></p>
                                            </div>
                                        </div>

                                    </div>                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="row settings_wrap">
                                    <div class="col-md-10 mx-auto">                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="heading">Password</p>
                                                <button type="button" class="btn btn-primary">Change Account Password</button>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="heading">Delete My Account</p>
                                                <button type="button" class="btn btn-danger">Delete Account</button>
                                            </div>
                                        </div>                                  
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>

                function myFunction(x) {
                    if (x.matches) { // If media query matches
                        var tab = document.getElementById("vert_tab");
                        var navigation = document.getElementById("navigation");
                        if (tab.classList.contains("col-3"))
                        {
                            tab.classList.remove("col-3");
                            navigation.classList.remove("flex-column");
                        }

                        var content = document.getElementById("vert_content");
                        if (content.classList.contains("col-9"))
                        {
                            content.classList.remove("col-9");
                            content.classList.add("col-12");                            
                        }


                    } 
                    else {
                        var tab = document.getElementById("vert_tab");
                        var navigation = document.getElementById("navigation");
                        if (tab.classList.contains("col-3"))
                        {

                        }
                        else
                        {
                            tab.classList.add("col-3");
                            navigation.classList.add("flex-column");                            
                        }
                        var content = document.getElementById("vert_content");
                        if (content.classList.contains("col-12"))
                        {
                            content.classList.remove("col-12");
                            content.classList.add("col-9");
                        }
                        else
                        {
                            content.classList.add("col-9");
                        }
                    }
                }

                var x = window.matchMedia("(max-width: 767px)")
                myFunction(x) // Call listener function at run time
                x.addListener(myFunction) // Attach listener function on state changes
            </script>
        </section>

        <!--FOOTER-->
        <?php include 'footer.php'; ?>
    </body>
</html>