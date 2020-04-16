<?php    
   session_start();
   
   if(session_destroy()) {
       echo "You have been logged out successfully. Redirecting to Homepage in 5 seconds.";
    header( "refresh:5; url=http://localhost/my_site_new/index.php" );
   }
?>