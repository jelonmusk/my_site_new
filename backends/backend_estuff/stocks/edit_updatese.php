<?php
    require '../connect.php';
    
    if( isset($_POST['update_id']) )
    {        
        
        
            $sql = "UPDATE stocks SET item_id = '$_POST[item_id]',quantity = '$_POST[quantity]' WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                echo "Stock Updated Successfully.";
                /*echo statement execution error. troubleshoot???*/
                header("Location: managese.php");
                
            }
            else {
                echo "Stock Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=managese.php" );
                //header("location: manage_sub.php");
            }
            /*echo "NULL";*/
        
    }
    else
    {
        echo "UPDATE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managese.php" );
    }
?>