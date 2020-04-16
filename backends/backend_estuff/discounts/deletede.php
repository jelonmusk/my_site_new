<?php
    require '../connect.php';
    
    if( isset($_POST['deleted_id']) )
    {
        $sql = "DELETE FROM discount WHERE id = '$_POST[deleted_id]' ";
        if ($conn->query($sql) === TRUE) 
        {    
            echo "Discount Deleted Successfully. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managede.php" );
        } 
        else 
        {    
            echo "Could not delete discount. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managede.php" );
        }
    }
    else
    {
        echo "DELETE Discount ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managede.php" );
    }
?>