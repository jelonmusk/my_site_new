<?php
    require '../connect.php';
    
    if( isset($_POST['delete_id']) )
    {
        $sql = "DELETE FROM e_stuff WHERE id = '$_POST[delete_id]' ";
        if ($conn->query($sql) === TRUE) 
        {    
            echo "Record Deleted Successfully. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managee.php" );
        } 
        else 
        {    
            echo "Could not delete record. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managee.php" );
        }
    }
    else
    {
        echo "DELETE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managee.php" );
    }
?>