<?php    
    if(session_status() == PHP_SESSION_NONE){
        //session has not started
        session_start();
    }
    if(isset($_SESSION['login_email']))
    {        
        $profile = <<<EOT
        <li class="nav-item dropdown last">
            <a class="nav-link dropdown-toggle" href="#" id="user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Account
            </a>
            <div class="dropdown-menu" aria-labelledby="user">
              <a class="dropdown-item" href="http://localhost/my_site_new/profile.php">Profile</a>
              <a class="dropdown-item" href="http://localhost/my_site_new/order.php">My Orders</a>
              <a class="dropdown-item" href="http://localhost/my_site_new/logout.php">Log Out</a>
            </div>
        </li>
EOT;
    }
    else
    {
        $profile = <<<EOT
        <li class="nav-item dropdown last">
            <a class="nav-link dropdown-toggle" href="#" id="user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Account
            </a>
            <div class="dropdown-menu" aria-labelledby="user">
              <a class="dropdown-item" href="http://localhost/my_site_new/sign_in.php">Sign In</a>
              <a class="dropdown-item" href="http://localhost/my_site_new/register.php">Register</a>
            </div>
        </li>
EOT;
    }


?>


<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">    
    <div class="container">
            <a class="navbar-brand" href="http://localhost/my_site_new/index.php">
            <img src="http://localhost/my_site_new/assets/icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            Books Online
            </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <!--<form class="form-inline my-2 my-lg-0 search_bar">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>-->

            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/my_site_new/about_us.php">About Us</a>
              </li>                      
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Explore
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Books</a>
                  <a class="dropdown-item" href="#">Old Books</a>
                  <a class="dropdown-item" href="http://localhost/my_site_new/estuff/index.php">E-Stuff</a>
                </div>
              </li>
                <?php echo $profile;  ?>
            </ul>                      
          </div>
    </div>                
</nav>