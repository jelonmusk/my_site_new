<?php
    require '../connect.php';
    
    if( isset($_POST['deleteg_id']) )
    {
        $sql = "DELETE FROM genre WHERE id = '$_POST[deleteg_id]' ";
        if ($conn->query($sql) === TRUE) 
        {    
            echo "Genre Deleted Successfully. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=manageg.php" );
        } 
        else 
        {    
            echo "Could not delete genre. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=manageg.php" );
        }
    }
    else
    {
        echo "DELETE GENRE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=manageg.php" );
    }
?>