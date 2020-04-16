<?php
    require '../connect.php';
    
    if( isset($_POST['update_id']) )
    {        
        if(!empty($_FILES['cover']['name']))
        {
            $pic_data = addslashes(file_get_contents($_FILES['cover']['name']));
            $sql = "UPDATE books SET author = '$_POST[book_author]', title = '$_POST[book_title]', genre_id = '$_POST[genre_id]', price = '$_POST[price]', discount = '$_POST[discount]', pub_id = '$_POST[publisher]', edition = '$_POST[edition]', new = '$_POST[new]', cover ='$pic_data'  WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                header("Location: manage.php");
            }
            else {
                echo "Record Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=manage.php" );
                //header("location: manage_sub.php");
            }    
            /*echo "NOT NULL";*/
        }
        else
        {
            $sql = "UPDATE books SET author = '$_POST[book_author]', title = '$_POST[book_title]', genre_id = '$_POST[genre_id]', price = '$_POST[price]', discount = '$_POST[discount]', pub_id = '$_POST[publisher]', edition = '$_POST[edition]', new = '$_POST[new]'  WHERE id = '$_POST[update_id]'";
        
            if ($conn->query($sql) === TRUE) {		            
                header("Location: manage.php");
            }
            else {
                echo "Record Updation Failed. Redirecting to Manage page in 5 seconds.";
                header( "refresh:5; url=manage.php" );
                //header("location: manage_sub.php");
            }
            /*echo "NULL";*/
        }
    }
    else
    {
        echo "UPDATE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=manage.php" );
    }
?>