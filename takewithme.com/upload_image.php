<?
include "bd.php";
if(is_array($_FILES))
{
    if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $sourcePath = $_FILES['userImage']['tmp_name'];
        $targetPath = "images/".date("Y-m-d-H-i-s").$_FILES['userImage']['name'];
        if(move_uploaded_file($sourcePath,$targetPath)) {
            $_SESSION['Photo']=$targetPath;
            $query="update `users` set `Photo`='".$targetPath."'";
            $result = mysqli_query ($conn,$query);
            ?>
            <img src="<?php echo $targetPath; ?>">
            <?php
            echo 'OK';
            exit();
        }
    }
}
?>
