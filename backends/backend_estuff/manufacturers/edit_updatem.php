<?php
    require '../connect.php';
    
    if( isset($_POST['update_id']) )
    {        
        
        
            $sql = "UPDATE manufacturer SET name = '$_POST[name]'WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                echo "Manufacturer Updated Successfully.";
                header("Location: managem.php");
                
            }
            else {
                echo "Manufacturer Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=managem.php" );
                //header("location: manage_sub.php");
            }
            /*echo "NULL";*/
        
    }
    else
    {
        echo "UPDATE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managem.php" );
    }
?>