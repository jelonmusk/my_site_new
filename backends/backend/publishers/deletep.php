<?php
    require '../connect.php';
    
    if( isset($_POST['deletep_id']) )
    {
        $sql = "DELETE FROM publisher WHERE id = '$_POST[deletep_id]' ";
        if ($conn->query($sql) === TRUE) 
        {    
            echo "Publisher Deleted Successfully. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managep.php" );
        } 
        else 
        {    
            echo "Could not delete publisher. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managep.php" );
        }
    }
    else
    {
        echo "DELETE PUBLISHER ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managep.php" );
    }
?>