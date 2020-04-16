<?php
    require '../connect.php';
    
    if( isset($_POST['deletem_id']) )
    {
        $sql = "DELETE FROM manufacturer WHERE id = '$_POST[deletem_id]' ";
        if ($conn->query($sql) === TRUE) 
        {    
            echo "Manufacturer Deleted Successfully. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managem.php" );
        } 
        else 
        {    
            echo "Could not delete manufacturer. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managem.php" );
        }
    }
    else
    {
        echo "DELETE Manufacturer ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managem.php" );
    }
?>