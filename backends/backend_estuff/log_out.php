<?php   
    
   session_start();
   
   if(session_destroy()) {
      header("Location: http://localhost/my_site_new/backends/backend_estuff/index.php");
   }
?>