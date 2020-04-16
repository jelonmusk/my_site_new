<?php
    require '../connect.php';
    
    if( isset($_POST['update_id']) )
    {        
       
        
            $sql = "UPDATE user_details SET user_id = '$_POST[user_id]', email = '$_POST[email]', mobile = '$_POST[mobile]', password = '$_POST[password]', first_name = '$_POST[first_name]', last_name = '$_POST[last_name]', address = '$_POST[address]', city = '$_POST[city]',state='$_POST[state]',college_name='$_POST[college_name]'  WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                header("Location: manageu.php");
            }
            else {
                echo "Record Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=manageu.php" );
                //header("location: manage_sub.php");
            }
            /*echo "NULL";*/
        
    }
    else
    {
        echo "UPDATE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=manageu.php" );
    }
?>