<?php
    require '../connect.php';
    
    if( isset($_POST['update_id']) )
    {        
        
        
            $sql = "UPDATE type SET name = '$_POST[name]'WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                echo "Type Updated Successfully.";
                /*echo statement execution error. troubleshoot???*/
                header("Location: managet.php");
                
            }
            else {
                echo "Type Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=managet.php" );
                //header("location: manage_sub.php");
            }
            /*echo "NULL";*/
        
    }
    else
    {
        echo "UPDATE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managet.php" );
    }
?>