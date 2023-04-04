<?php 
if(isset($_POST['deconnecter'])){
    session_start();
    $_SESSION = array();
    session_destroy();
    header("location:index1.php");
}
?>
