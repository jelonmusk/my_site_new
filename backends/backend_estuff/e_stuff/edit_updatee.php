<?php
    require '../connect.php';
    
    if( isset($_POST['update_id']) )
    {        
        if(!empty($_FILES['image']['name']))
        {
            $pic_data = addslashes(file_get_contents($_FILES['image']['name']));
            $sql = "UPDATE e_stuff SET item = '$_POST[item]', specification = '$_POST[specification]', type_id = '$_POST[type_id]', price = '$_POST[price]', discount = '$_POST[discount]', man_id = '$_POST[manufacturer]', version = '$_POST[version]', new = '$_POST[new]', image ='$pic_data'  WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                header("Location: managee.php");
            }
            else {
                echo "Record Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=managee.php" );
                //header("location: manage_sub.php");
            }    
            /*echo "NOT NULL";*/
        }
        else
        {
            $sql = "UPDATE e_stuff SET item = '$_POST[item]', specification = '$_POST[specification]', type_id = '$_POST[type_id]', price = '$_POST[price]', discount = '$_POST[discount]', man_id = '$_POST[manufacturer]', version = '$_POST[version]', new = '$_POST[new]'  WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                header("Location: managee.php");
            }
            else {
                echo "Record Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=managee.php" );
                //header("location: manage_sub.php");
            }
            /*echo "NULL";*/
        }
    }
    else
    {
        echo "UPDATE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managee.php" );
    }
?>