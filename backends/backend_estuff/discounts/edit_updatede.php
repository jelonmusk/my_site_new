<?php
    require '../connect.php';
    
    if( isset($_POST['update_id']) )
    {        
        
        
            $sql = "UPDATE discount SET description = '$_POST[description]'WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                echo "Discount Updated Successfully.";
                /*echo statement execution error. troubleshoot???*/
                header("Location: managede.php");
                
            }
            else {
                echo "Discount Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=managede.php" );
                //header("location: manage_sub.php");
            }
            /*echo "NULL";*/
        
    }
    else
    {
        echo "UPDATE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managede.php" );
    }
?>