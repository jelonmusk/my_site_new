<?php
    require '../connect.php';
    
    if( isset($_POST['update_id']) )
    {        
        
        
            $sql = "UPDATE genre SET name = '$_POST[name]'WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                echo "Genre Updated Successfully.";
                /*echo statement execution error. troubleshoot???*/
                header("Location: manageg.php");
                
            }
            else {
                echo "Genre Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=manageg.php" );
                //header("location: manage_sub.php");
            }
            /*echo "NULL";*/
        
    }
    else
    {
        echo "UPDATE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=manageg.php" );
    }
?>