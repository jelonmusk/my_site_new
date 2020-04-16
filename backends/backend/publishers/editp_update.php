<?php
    require '../connect.php';
    
    if( isset($_POST['update_id']) )
    {        
        
        
            $sql = "UPDATE publisher SET name = '$_POST[name]'WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                echo "Publisher Updated Successfully.";
                header("Location: managep.php");
                
            }
            else {
                echo "Publisher Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=managep.php" );
                //header("location: manage_sub.php");
            }
            /*echo "NULL";*/
        
    }
    else
    {
        echo "UPDATE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managep.php" );
    }
?>