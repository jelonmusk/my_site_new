<?php
    require '../connect.php';
    
    if( isset($_POST['update_id']) )
    {        
        
        
            $sql = "UPDATE stocks SET book_id = '$_POST[book_id]',copies = '$_POST[copies]' WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                echo "Stock Updated Successfully.";
                /*echo statement execution error. troubleshoot???*/
                header("Location: manages.php");
                
            }
            else {
                echo "stock Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=manages.php" );
                //header("location: manage_sub.php");
            }
            /*echo "NULL";*/
        
    }
    else
    {
        echo "UPDATE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=manages.php" );
    }
?>